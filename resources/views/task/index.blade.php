@props(['tasks', 'categories'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>To Do List</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-dashboard></x-dashboard>
    <main class="welcome-main">
        @if (request()->routeIs('task.completed'))
            <h1 class="welcome-main-h1">Tareas Completas</h1>
        @else
            <h1 class="welcome-main-h1">Tareas</h1>
        @endif

        <section class="tareas-container">
            <div class="tareas-container-butons-part">
                <a href="{{ route('task.create') }}">Añadir tarea</a>


                <form action="{{ route('task.search') }}" method="POST" class="tareas-container-form">
                    @csrf

                    <select name="category_id" id="category_id" class="tareas-container-form-select">
                        <option value="0" class="tareas-container-form-options">Todas</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}" class="tareas-container-form-options">
                                {{ $category->name }}
                            </option>
                        @empty
                        @endforelse
                    </select>

                    <button type="submit" class="tareas-container-form-submit">Filtrar</button>
                </form>
            </div>
            <div class="tareas-container-searchList">
                <p style="color: aliceblue" class="tareas-container-searchList-text">Mostrando desde la
                    {{ $tasks->FirstItem() }} hasta {{ $tasks->LastItem() }}
                    de
                    {{ $tasks->total() }}</p>
            </div>
            <div class="tareas-container-render">
                <table class="tareas-container">
                    <thead class="tareas-container-thead">
                        <tr class="tareas-container-tr">
                            <th class="tareas-container-td">Estatus</th>
                            <th class="tareas-container-td">Tarea</th>
                            <th class="tareas-container-td">Categoría</th>
                            <th class="tareas-container-td">Fecha</th> <!-- Agregué este encabezado que faltaba -->
                        </tr>
                    </thead>
                    <tbody class="tareas-container-tbody">
                        @forelse ($tasks as $task)
                            <x-task-item :task="$task" />
                        @empty
                            <p class="tareas-container-empty-p">!Cree su primera Tarea! <a
                                    href="{{ route('task.create') }}" class="tareas-container-empty-a">Aqui</a> </p>
                        @endforelse
                    </tbody>
                </table>
                @if ($tasks->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $tasks->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            </div>
        </section>
    </main>
</body>

</html>



<div>

</div>
<style>

</style>
