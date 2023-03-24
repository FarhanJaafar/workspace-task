<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function store(Request $request)
    {
        Workspace::create([
            'user_id' =>auth()->user()->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status
        ]);


        return to_route('home');
    }

    public function delete(Workspace $workspace)
    {
        $workspace->delete();

        return to_route('home');
    }

    public function show(Workspace $workspace)
    {
        $tasks = $workspace->task;
        return view('workspace.show', compact('workspace', 'tasks'));
    }

    public function edit(Workspace $workspace)
    {
        $workspace=Workspace::all();
        return view('workspace.edit', compact('workspace'));
    }

    public function update(Request $request, Workspace $workspace)
    {
        $workspace->update([
            'user_id' =>$workspace->user_id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status
        ]);
        return to_route('home');
    }

}
