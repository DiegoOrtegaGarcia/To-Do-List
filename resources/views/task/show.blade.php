@props(['task'])
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="show-task-conteiner">
    <h3 class="show-task-conteiner-h3">{{ $task->name }}</h3>

    <a href="{{ route('task') }}" class="show-task-conteiner-button-back" title="Volver">
        &larr;
    </a>

    <div class="show-task-conteiner-text-part">
        <p class="show-task-conteiner-text-part-p">
            <strong>Descripción:</strong> {{ $task->description }}
        </p>

        <p class="show-task-conteiner-text-part-p">
            <strong>Categoría:</strong> {{ $task->category->name }}
        </p>

        <p class="show-task-conteiner-text-part-p">
            <strong>Fecha Límite:</strong>
            {{ $task->limitDate ? (new \Carbon\Carbon($task->limitDate))->format('Y-m-d') : '-' }}
        </p>

        <p class="show-task-conteiner-text-part-p">
            <strong>Fecha de Creación:</strong> {{ (new \Carbon\Carbon($task->date))->format('Y-m-d') }}
        </p>

        <p class="show-task-conteiner-text-part-p">
            <strong>Estado:</strong>
            <span class="task-status-indicator">
                <span class="status-circle status {{ $task->status ? 'in-progress' : 'completed' }}"></span>
                {{ $task->status ? 'Sin Completar' : 'Completada' }}
            </span>
        </p>
    </div>

    <div class="show-task-conteiner-buttons-part">
        @if ($task->status == true)
            <form action="{{ route('task.end', $task->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('PUT')
                <button type="submit" class="show-task-conteiner-buttons-end">
                    <span class="button-icon">✓</span>
                    Terminar Tarea
                </button>
            </form>
        @else
            <form action="{{ route('task.end', $task->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('PUT')
                <button type="submit" class="show-task-conteiner-buttons-dont-end">
                    <span class="button-icon">↺</span>
                    Descompletar Tarea
                </button>
            </form>
        @endif

        <a href="{{ route('task.edit', $task->id) }}" class="show-task-conteiner-buttons-a-edit">
            <span class="button-icon">✎</span>
            Editar
        </a>

        <form action="{{ route('task.delete', $task->id) }}" method="POST" style="display: inline;"
            class="show-task-conteiner-buttons-form-delete">
            @csrf
            @method('DELETE')
            <button type="submit" class="show-task-conteiner-buttons-a-delete"
                onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
                <span class="button-icon">🗑️</span>
                Eliminar
            </button>
        </form>
    </div>
</div>
