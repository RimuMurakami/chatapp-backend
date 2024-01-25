<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var \App\Models\User $user **/

        // loadを使用したパターン
        $user = Auth::user();
        $groups = $user->load('groups.channels.messages.user', 'groups.channels.tasks', 'groups.group_user')->groups;
        $channels = $groups->flatMap->channels;
        // $messages = $channels->flatMap->messages;

        // profile-icon取得
        // TODO: フロント側でうまく取得できない
        // $profileIcon = Storage::disk('local')->url($user->profile_path);
        $profileIcon = Storage::get($user->profile_path);


        // withを使用したパターン
        // $user = User::with('groups.channels.messages.user')->find(Auth::id());
        // $groups = $user->groups;
        // $channels = $groups->flatMap->channels;
        // $messages = $channels->flatMap->messages;


        // roleお試し取得
        // $roles = [];
        // foreach ($groups as $group) {
        //     $roles[$group->id] = $group->pivot->role;
        // }

        return response([
            'profileIcon' => $profileIcon,
            'user' => $user,
            'groups' => $groups,
            'channels' => $channels,
            'profileIcon' => $profileIcon,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
