<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTask = Task::create([
            'channel_id' => $request->channel_id,
            'user_id' => $request->user_id,
            'task' => $request->task,
        ]);
        $newTask = $newTask->load('user');
        return response($newTask, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($channel_id)
    {
        // $tasks = Task::where('channel_id', $channel_id)->get();
        // $tasks = $tasks->load('user');
        // return response($tasks);
        $tasks = Task::where('channel_id', $channel_id)->with('user:id,name')->get();
        return response($tasks);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $deletedTask = $task;
        $task->delete();
        return response($deletedTask);
    }
}
