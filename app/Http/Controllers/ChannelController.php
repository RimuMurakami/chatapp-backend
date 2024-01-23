<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use App\Models\Channel;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'hi';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChannelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChannelRequest $request, Channel $channel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        //
    }
}
