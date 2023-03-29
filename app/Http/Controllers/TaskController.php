<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use App\Mail\TaskDoneMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

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
        // $this->authorize('delete', $task);
        $task->delete();
        return to_route('workspace.show', compact('workspace'));
    }

    public function edit(Workspace $workspace, Task $task)
    {
        // $this->authorize('update', $workspace, $task);
        return view('task.edit', compact('workspace', 'task'));
    }

    public function update(Request $request, Workspace $workspace, Task $task)
    {
        // $this->authorize('update', $workspace, $task);
        $task->update([
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status
        ]);

        Mail::to($workspace->user)->send(new TaskDoneMail($task));

        return to_route('workspace.show', compact('workspace', 'task'));
    }
}
