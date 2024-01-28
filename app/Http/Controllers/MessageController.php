<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Channel;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $newMessage = null;
        if ($request->type === 'text') {
            $newMessage = Message::create([
                'channel_id' => $request->channel_id,
                'user_id' => $request->user_id,
                'message' => $request->message,
                'type' => $request->type,
            ]);
        }
        return response($newMessage, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($channel_id)
    {
        // $channel_name = Channel::find($channel_id)->channel->name;
        $messages = Message::where('channel_id', $channel_id)->get();
        $messages = $messages->load('user', 'channel');
        // return response(['messages' => $messages, 'channel_name' => $channel_name]);
        return response($messages);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
