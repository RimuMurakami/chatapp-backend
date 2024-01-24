<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $groups = Auth::user()->groups;

        $channels = collect();
        foreach ($groups as $group) {
            $channels = $channels->concat($group->channels);
        }

        $messages = collect();
        foreach ($channels as $channel) {
            $messages = $messages->concat($channel->messages);
        }

        // $channels = $groups->flatMap->channels;
        // $messages = $channels->flatMap->messages;

        return response([
            'user' => $user,
            'groups' => $groups,
            'channels' => $channels,
            'messages' => $messages
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
