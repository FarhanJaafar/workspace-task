@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome!') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{auth::user()->name}}{{ __(' are logged in!') }}
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">{{ __('Workspace') }}</div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Workspace
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{route ('workspace.store')}}">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Fill Workspace Information</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Workspace Name</label>
                                            <input type="name" class="form-control" id="exampleFormControlInput1" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Due Date</label>
                                            <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="datetime">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Status</label>
                                            <input type="status" class="form-control" id="exampleFormControlInput1" value="In Progress"  name="status" readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Workspace Name</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($workspaces as $key => $workspace)
                            <tr>
                                <th scope="row">{{ $key +1}}</th>
                                <td>{{ $workspace->name }}</td>
                                <td>{{ $workspace->datetime }}</td>
                                <td>{{ $workspace->status }}</td>
                                @if ($workspace->status == "In Progress")
                                <td>
                                <a href="{{route ('workspace.show', $workspace)}}" type="button" name="show" class="btn btn-secondary">Show</a>
                                <a href="{{route ('workspace.edit', $workspace)}}" type="button" name="edit" class="btn btn-warning">Edit</a>
                                <a href="{{route ('workspace.delete', $workspace)}}" type="button" class="btn btn-danger">Delete</a>
                                </td>
                                @else
                                <td>
                                    <a href="{{route ('workspace.show', $workspace)}}" type="button" name="show" class="btn btn-secondary">Show</a>
                                    <a href="{{route ('workspace.delete', $workspace)}}" type="button" class="btn btn-danger">Delete</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
