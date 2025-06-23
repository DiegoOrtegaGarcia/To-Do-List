@props(['task', 'categories'])
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="edit-container">
    <h1 class="edit-container-h1">Editar Tarea</h1>
    <a href="{{ route('task') }}" class="edit-container-button-back">←</a>

    <form method="POST" action="{{ route('task.update', $task->id) }}" class="edit-container-form">
        @csrf
        @method('PUT')

        <div class="edit-container-form-columns">
            <div>
                <div class="edit-container-form-div">
                    <label for="name" class="edit-container-form-div-label">Nombre de la Tarea</label>
                    <input type="text" name="name" id="name" class="edit-container-form-div-input" required
                        value="{{ $task->name }}">
                </div>

                <div class="edit-container-form-div">
                    <label for="category_id" class="edit-container-form-div-label">Categoría</label>
                    <select name="category_id" id="category_id" class="edit-container-form-div-select">
                        <option value="{{ $task->category->id }}" class="edit-container-form-div-option">
                            {{ $task->category->name }}
                        </option>
                        @foreach ($categories as $category)
                            @if ($category->id != $task->category->id)
                                <option value="{{ $category->id }}" class="edit-container-form-div-option">
                                    {{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="edit-container-form-div">
                    <input type="checkbox" name="hasLimit" id="hasLimit" class="edit-container-form-div-checkbox"
                        value="1" {{ $task->hasLimit ? 'checked' : '' }}>
                    <label for="hasLimit" class="edit-container-form-div-checkbox-label">¿Tiene fecha límite?</label>
                </div>

                <div class="edit-container-form-div" id="limitDateGroup" style="display: none;">
                    <label for="limitDate" class="edit-container-form-div-label">Fecha Límite</label>
                    <input type="datetime-local" name="limitDate" id="limitDate" class="edit-container-form-div-input"
                        value="{{ $task->limitDate }}">
                </div>
            </div>

            <div>
                <div class="edit-container-form-div">
                    <label for="description" class="edit-container-form-div-label">Descripción</label>
                    <textarea name="description" id="description" class="edit-container-form-div-textarea" required>{{ $task->description ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="edit-container-form-submit">Actualizar Tarea</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('hasLimit');
        const dateGroup = document.getElementById('limitDateGroup');

        // Mostrar/ocultar campo de fecha límite al cargar
        dateGroup.style.display = checkbox.checked ? 'block' : 'none';
        document.getElementById('limitDate').required = checkbox.checked;

        // Actualizar al cambiar el checkbox
        checkbox.addEventListener('change', function() {
            dateGroup.style.display = this.checked ? 'block' : 'none';
            document.getElementById('limitDate').required = this.checked;
        });
    });
</script>
