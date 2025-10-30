<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request) {
        $categoryId = $request->query('category_id');

        $query = Task::with('category')->latest();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $tasks = $query->paginate(10)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('tasks.index', compact('tasks','categories','categoryId'));
    }

    public function create() {
        $categories = Category::orderBy('name')->get();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'category_id' => ['required','exists:categories,id'],
            'title'       => ['required','string','min:2','max:150'],
            'description' => ['nullable','string','max:2000'],
            'completed'   => ['nullable','boolean'],
        ]);

        $data['completed'] = (bool) ($request->boolean('completed'));
        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada!');
    }

    public function show(Task $task) {
        $task->load('category');
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task) {
        $categories = Category::orderBy('name')->get();
        return view('tasks.edit', compact('task','categories'));
    }

    public function update(Request $request, Task $task) {
        $data = $request->validate([
            'category_id' => ['required','exists:categories,id'],
            'title'       => ['required','string','min:2','max:150'],
            'description' => ['nullable','string','max:2000'],
            'completed'   => ['nullable','boolean'],
        ]);

        $data['completed'] = (bool) ($request->boolean('completed'));
        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada!');
    }

    public function destroy(Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarefa removida!');
    }
}

