<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use App\Models\Channel;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $groups = $user->load('groups.channels', 'groups.group_user')->groups;
        $channels = $groups->flatMap->channels;

        // 各チャンネルに所属するユーザーを取得
        $channelsWithUsers = $channels->map(function ($channel) {
            $userIds = GroupUser::where('group_id', $channel->group_id)->pluck('user_id');
            $users = User::whereIn('id', $userIds)->get();
            $channel->users = $users;
            return $channel;
        });

        return response(
            $channelsWithUsers
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $newGroup = Group::create([
                'name' => $request->name,
                'description' => $request->overview,
            ]);

            $user = Auth::user();

            foreach ($request->users as $user_id) {
                GroupUser::create([
                    'user_id' => $user_id,
                    'group_id' => $newGroup->id,
                    'role' => $user->id === $user_id ? 'owner' : 'member',
                ]);
            }

            $newChannel = Channel::create([
                'group_id' => $newGroup->id,
                'name' => $request->name,
                'overview' => $request->overview,
                'type' => $request->type,
            ]);

            // チャンネルに所属するユーザー情報を取得
            $userIds = GroupUser::where('group_id', $newChannel->group_id)->pluck('user_id');
            $users = User::whereIn('id', $userIds)->get();
            $newChannel->users = $users;

            $firstMessage = Message::create([
                'channel_id' => $newChannel->id,
                'user_id' => $user->id,
                'message' => "{$user->name}がチャンネルを作成しました。",
                'type' => 'text',
            ]);

            DB::commit();

            return response($newChannel, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'DB Error'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel)
    {
        // api/channels/${user_id}

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Channel $channel)
    {
        $channel->update($request->all());

        // チャンネルに所属するユーザー情報を取得
        $userIds = GroupUser::where('group_id', $channel->group_id)->pluck('user_id');
        $users = User::whereIn('id', $userIds)->get();
        $channel->users = $users;

        return response($channel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        Message::where('channel_id', $channel->id)->delete();

        $channelData = $channel;
        $channel->delete();
        return response($channelData);
    }
}
