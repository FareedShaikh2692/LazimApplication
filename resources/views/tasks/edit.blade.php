@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>
                <div class="card-body">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{ $task->title }}" type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea value="{{ $task->description }}" name="description" id="description" class="form-control">{{$task->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="due_date">Date</label>
                            <input  value="{{ $task->date }}" type="date" name="date" id="date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
