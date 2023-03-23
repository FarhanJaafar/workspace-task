<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        Task::create([
            'workspace_id' =>auth()->user()->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status
        ]);

        return to_route('task.show');
    }

    public function show(Workspace $workspace)
    {
        $tasks = $workspace->task;
        return view('task.show', compact('workspace','tasks'));
    }
}
