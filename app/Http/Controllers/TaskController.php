<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $categories = Category::all();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(CreateTaskRequest $request)
    {
        // Preluarea datelor validate
        $validatedData = $request->validated();

        // Crearea unei noi sarcini în baza de date
        $task = Task::create($validatedData);

        // Adăugarea unui mesaj flash pentru succes
        session()->flash('success', 'Sarcina a fost creată cu succes!');

        return redirect()->route('tasks.index');
    }

    public function show(int $id)
    {
        $tasks = Task::with('category')->findOrFail($id);

        return view('tasks.show', [
            'tasks' => $tasks,
        ]);
    }

    public function edit(int $id)
    {
        $task = Task::findOrFail($id);
        $categories = Category::all();

        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $validatedData = $request->validated();
        $task->update($validatedData);
        // Afișează toate datele trimise prin formular pentru debugging
        //dd($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy(int $id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->route('tasks.index');
    }
}
