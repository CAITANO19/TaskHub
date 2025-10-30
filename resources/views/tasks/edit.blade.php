@extends('layouts.app')

@section('content')
<h1>Editar Tarefa</h1>

<form method="POST" action="{{ route('tasks.update', $task) }}" class="mt-3">
  @csrf @method('PUT')

  <div class="mb-3">
    <label class="form-label">Categoria</label>
    <select name="category_id" class="form-select">
      @foreach($categories as $c)
        <option value="{{ $c->id }}" @selected(old('category_id', $task->category_id)==$c->id)>{{ $c->name }}</option>
      @endforeach
    </select>
    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}">
    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $task->description) }}</textarea>
    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
  </div>

  <div class="form-check mb-3">
    <input type="checkbox" name="completed" value="1" class="form-check-input" id="completedCheck"
      @checked(old('completed', $task->completed))>
    <label class="form-check-label" for="completedCheck">Concluída</label>
  </div>

  <button class="btn btn-primary">Atualizar</button>
  <a href="{{ route('tasks.index') }}" class="btn btn-light">Cancelar</a>
</form>
@endsection


