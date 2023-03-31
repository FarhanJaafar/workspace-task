<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AddWorkspaceRequest;
use Storage;
use File;

class WorkspaceController extends Controller
{
    public function store(AddWorkspaceRequest $request)
    {
        if ($request->hasFile('attachment')) {
            //rename file
            $fileName = $request->name.'-'.date('Y-m-d').'.'.$request->attachment->getClientOriginalExtension();
            //simpan gambar file
            Storage::disk('public')->put('/workspace/'.$fileName, File::get($request->attachment));
        }

        Workspace::create([
            'user_id' =>auth()->user()->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status,
            'attachment'=>$fileName ?? 'No attachment'
        ]);

        return to_route('home');
    }

    public function delete(Workspace $workspace)
    {
        $this->authorize('delete', $workspace);
        $workspace->task()->delete();
        $workspace->delete();

        return to_route('home');
    }

    public function show(Workspace $workspace)
    {
        $this->authorize('view', $workspace);
        $tasks = $workspace->task;
        return view('workspace.show', compact('workspace', 'tasks'));
    }

    public function edit(Workspace $workspace)
    {
        $this->authorize('update', $workspace);
        return view('workspace.edit', compact('workspace'));
    }

    public function update(Request $request, Workspace $workspace)
    {
        // $this->authorize('update', $workspace);
        $workspace->update([
            'user_id' =>auth()->user()->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status
        ]);
        return to_route('home');
    }


}
