<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupUserRequest;
use App\Http\Requests\UpdateGroupUserRequest;
use App\Models\GroupUser;

class GroupUserController extends Controller
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
    public function store(StoreGroupUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupUser $groupUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupUserRequest $request, GroupUser $groupUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupUser $groupUser)
    {
        //
    }
}
