<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.show');
    }

    public function store(Request $request, Workspace $workspace)
    {
        Task::create([
            'workspace_id' =>$workspace->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            //'status'=>$request->status
        ]);

        return to_route('workspace.show', compact('workspace'));
    }
}
