@props(['categories'])
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="create-container">
    <h1 class="create-container-h1">Crear Nueva Tarea</h1>

    <form method="POST" action="{{ route('task.store') }}" class="create-container-form">
        @csrf

        <div class="create-container-form-columns">
            <div>
                <div class="create-container-form-div">
                    <label for="name" class="create-container-form-div-label">Nombre de la Tarea</label>
                    <input type="text" name="name" id="name" class="create-container-form-div-input"
                        required>
                </div>

                <div class="create-container-form-div">
                    <label for="category_id" class="create-container-form-div-label">Categoría</label>
                    <select name="category_id" id="category_id" class="create-container-form-div-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" class="create-container-form-div-option">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="create-container-form-div">
                    <input type="checkbox" name="hasLimit" id="hasLimit"
                        class="create-container-form-div-input-checkbox" value="1">
                    <label for="hasLimit" class="create-container-form-div-checkbox-label">¿Tiene fecha límite?</label>
                </div>

                <div class="create-container-form-div" id="limitDateGroup" style="display: none;">
                    <label for="limitDate" class="create-container-form-div-label">Fecha Límite</label>
                    <input type="datetime-local" name="limitDate" id="limitDate"
                        class="create-container-form-div-input">
                </div>
            </div>

            <div>
                <div class="create-container-form-div">
                    <label for="description" class="create-container-form-div-label">Descripción</label>
                    <textarea name="description" id="description" class="create-container-form-div-textarea" required
                        placeholder="Tengo que..."></textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="create-container-form-submit">Crear Tarea</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('hasLimit');
        const dateGroup = document.getElementById('limitDateGroup');

        checkbox.addEventListener('change', function() {
            dateGroup.style.display = this.checked ? 'block' : 'none';
            document.getElementById('limitDate').required = this.checked;
        });
    });
</script>
