@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Edit Task</h2>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <input type="text" class="form-group" name="name" value="{{ $task->name }}" placeholder="Name..." id="">
                        @error('name')
                        <span id="name-error" class="error text-danger" style="display:block;">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-group" name="content" value="{{ $task->content }}" placeholder="Content..." id="">
                    </div>
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
