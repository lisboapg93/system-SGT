<?php

// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::where('user_id', Auth::id())->get();
    return view('task', ['tasks' => $tasks]);
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'due_date' => 'required|date',
    ]);

    Task::create([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
        'is_completed' => false,
    ]);

    return redirect()->route('task')->with('success', 'Tarefa criada com sucesso!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'due_date' => 'required|date',
    ]);

    $task = Task::where('user_id', Auth::id())->findOrFail($id);
    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
        'is_completed' => $request->has('is_completed'),
    ]);

    return redirect()->route('task')->with('success', 'Tarefa atualizada com sucesso!');
}

public function destroy($id)
{
    $task = Task::where('user_id', Auth::id())->findOrFail($id);
    $task->delete();

    return redirect()->route('task')->with('success', 'Tarefa excluída com sucesso!');
}

}