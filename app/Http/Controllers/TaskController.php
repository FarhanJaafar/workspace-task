<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('');
    }

    public function store(Request $request, Workspace $workspace)
    {
        Task::create([
            'workspace_id' =>$workspace->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
        ]);

        return to_route('workspace.show', compact('workspace'));
    }

    public function delete(Workspace $workspace, Task $task)
    {
        $task->delete();
        return to_route('workspace.show', compact('workspace'));
    }

    public function edit(Workspace $workspace, Task $task)
    {
        return view('task.edit', compact('workspace', 'task'));
    }

    public function update(Request $request, Workspace $workspace, Task $task)
    {
        $task->update([
            // 'user_id' =>auth()->user()->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status
        ]);

        return to_route('workspace.show', compact('workspace', 'task'));
    }


}
