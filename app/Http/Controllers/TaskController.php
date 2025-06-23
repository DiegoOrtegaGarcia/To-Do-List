<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa la fachada Auth
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener el usuario autenticado
        /** @var User $user */
        $user = Auth::user();

        // Obtener las tareas del usuario autenticado
        $tasks = $user->tasks()
            ->orderBy('date', 'desc')
            ->where("status", "=", true)
            ->paginate(10);

        $categories = Category::without("task")->get();
        return view("task.index", ["tasks" => $tasks, "categories" => $categories]);
    }
    public function completed()
    {
        /** @var User $user */
        $user = Auth::user();
        $tasks = $user->tasks()
            ->orderBy('date', 'desc')
            ->where("status", false) // Cambiado a false
            ->paginate(10);

        $categories = Category::without("task")->get();
        return view("task.index", ["tasks" => $tasks, "categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::without("task")->get();
        return view("task.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:100",
            "description" => "required|string",
            "hasLimit" => "sometimes|boolean",
            "limitDate" => "nullable|date|after_or_equal:today",
            "category_id" => "required|exists:categories,id"
        ]);

        // Crear la tarea con datos combinados
        $task = new Task();
        $task->name = $validated['name'];
        $task->status = true;
        $task->description = $validated['description'];
        $task->hasLimit = $request->has('hasLimit');
        $task->category_id = $validated['category_id'];

        // Asignar valores manualmente
        $task->user_id = Auth::id(); // Usar el ID del usuario autenticado
        $task->date = now(); // Fecha actual de creación

        // Manejar fecha límite si es necesario
        if ($task->hasLimit && isset($validated['limitDate'])) {
            $task->limitDate = $validated['limitDate'];
        } else {
            $task->limitDate = null;
        }

        // Guardar en la base de datos
        $task->save();

        // Redireccionar con mensaje de éxito
        return redirect()->route('task')->with('success', 'Tarea creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener la tarea solo si pertenece al usuario autenticado
        $task = Task::where('user_id', Auth::id())
            ->without(["user"])
            ->with(["category"])
            ->findOrFail($id);

        return view("task.show", ["task" => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener la tarea solo si pertenece al usuario autenticado
        $task = Task::where('user_id', Auth::id())
            ->with(["user", "category"])
            ->findOrFail($id);

        $categories = Category::without("task")->get();
        return view("task.edit", ["task" => $task, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => "required|string|max:100",
            "description" => "required|string",
            "hasLimit" => "sometimes|boolean",
            "limitDate" => "nullable|date|after_or_equal:today",
            "category_id" => "required|exists:categories,id"
        ]);

        // Obtener la tarea solo si pertenece al usuario autenticado
        $task = Task::where('user_id', Auth::id())
            ->findOrFail($id);

        $task->name = $validated['name'];
        $task->description = $validated['description'];
        $task->hasLimit = $request->has('hasLimit');
        $task->category_id = $validated['category_id'];

        if ($task->hasLimit && isset($validated['limitDate'])) {
            $task->limitDate = $validated['limitDate'];
        } else {
            $task->limitDate = null;
        }

        $task->save();

        return redirect()->route('task')->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar solo si la tarea pertenece al usuario autenticado
        Task::where('user_id', Auth::id())
            ->findOrFail($id)
            ->delete();

        return redirect()->route('task')->with('success', 'Tarea eliminada correctamente');
    }

    public function search(Request $request)
    {
        $validated = $request->validate(
            ["category_id" => "required|exists:categories,id"]
        );

        if ($validated["category_id"] == 0) {
            return redirect()->route('task');
        } else {
            // Obtener las tareas del usuario autenticado
            /** @var User $user */
            $user = Auth::user();
            $tasks = $user->tasks()
                ->with('category')
                ->where("category_id", $validated["category_id"])
                ->where("status", "=", true)
                ->orderBy('date', 'desc')
                ->paginate(10);

            return view("task.index", ["tasks" => $tasks, "categories" => Category::all()]);
        }
    }

    public function end(string $id)
    {
        // Cambiar estado solo si la tarea pertenece al usuario autenticado
        $task = Task::where('user_id', Auth::id())
            ->findOrFail($id);

        $task->status = !$task->status;
        $task->save();

        return redirect()->route("task.show", $task->id);
    }
}
