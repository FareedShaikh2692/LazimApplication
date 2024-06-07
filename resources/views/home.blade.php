@extends('layouts.app')

@section('content')
    <div class="container">

        <h3>Task List</h3>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th class="d-flex">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td >{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->date }}</td>
                        <td class="d-flex">                            
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-1">Delete</button>
                            </form>
                            <a href="{{ route('tasks.edit', $task->id) }}"  class="btn btn-primary m-1">Edit</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
     
    </div>
@endsection
