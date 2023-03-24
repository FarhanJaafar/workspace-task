@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Workspace Information</div>
                <div class="card-body">
                    <form method="POST" action="{{route ('workspace.edit', $workspace)}}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Task Name</label>
                                <input type="name" class="form-control" id="exampleFormControlInput1" name="name" placeholder="{{ $workspace->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Due Date</label>
                                <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="datetime">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Status</label>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      Status
                                    </a>

                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                  </div>
                            </div>
                        </div>
                        <a href="{{route ('home')}}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
