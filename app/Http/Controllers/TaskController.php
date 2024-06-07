<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        return view('home', compact('tasks'));
    }
    public function create()
    {
        return view('tasks.create');
    } 
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $task = new Task();
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->date = $validatedData['date'];
        $task->user_id = auth()->user()->id; 
        $task->save();
        return redirect()->route('home')->with('success', 'Task created successfully.');
    }
    
    public function edit(Task $task)
    {       
        return view('tasks.edit', compact('task'));
    }
    
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $task->update($request->only('title', 'description','due_date'));

        return redirect()->route('home')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('home')->with('success', 'Task deleted successfully.');
    }
}
