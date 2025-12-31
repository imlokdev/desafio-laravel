<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('task.index', [
            'tasks' => Task::paginate(8),
            'active' => true
        ]);
    }

    public function trash()
    {
        return view('task.index', [
            'tasks' => Task::onlyTrashed()->paginate(8),
            'active' => false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $infos = $request->validate([
                'title' => 'required|string|max:250',
                'description' => 'required|string|max:500',
                'completed' => 'boolean'
            ]);
            
            Task::create($infos);

            return redirect()->back()->with('success', 'Tarefa criada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possivel criar a tarefa.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        try {
            $infos = $request->validate([
                'title' => 'required|string|max:250',
                'description' => 'required|string|max:500',
                'completed' => 'boolean'
            ]);

            $task->update($infos);

            return redirect()->back()->with('success', 'Tarefa atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possivel atualizar a tarefa.');
        }
    }

    public function archive(Task $task)
    {
        try {
            $task->delete();
            return redirect()->back()->with('success', 'Tarefa arquivada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possivel arquivar a tarefa.');
        }
    }

    public function restore(Task $task)
    {
        try {
            $task->restore();
            return redirect()->back()->with('success', 'Tarefa restaurada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possivel restaurar a tarefa.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $task->forceDelete();
            return redirect()->back()->with('success', 'Tarefa excluída com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Não foi possivel excluir a tarefa.');
        }
    }
}
