<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Inertia\Inertia;

class TasksController extends Controller
{
    public function index()
    {
        $Tasks = Task::all();      
        return Inertia::render('Task/Index', ['tasks' => $Tasks]);
        
    }
    public function create()
    {
        return Inertia::render('Task/Create');
    }
    public function store(Request $request)
    {
        $Task = new Task($request->all());
        $Task->save();
        return redirect()->route('tasks.index');
    }
    public function destroy(Task $Task)
    {
        $Task->delete();
        return redirect()->back();
    }
    public function edit(Task $Task)
    {
        return Inertia::render('Task/Create', ['task' => $Task, 'isUpdating' => true]);        
    }
    public function update(Request $request, Task $Task)
    {
    $Task->update($request->all());
    return redirect()->route('tasks.index');    
    }
}
