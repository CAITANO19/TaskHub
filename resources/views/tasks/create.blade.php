@extends('layouts.app')

@section('content')
<h1>Nova Tarefa</h1>

<form method="POST" action="{{ route('tasks.store') }}" class="mt-3">
  @csrf

  <div class="mb-3">
    <label class="form-label">Categoria</label>
    <select name="category_id" class="form-select">
      <option value="">Selecione</option>
      @foreach($categories as $c)
        <option value="{{ $c->id }}" @selected(old('category_id')==$c->id)>{{ $c->name }}</option>
      @endforeach
    </select>
    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
  </div>

  <div class="form-check mb-3">
    <input type="checkbox" name="completed" value="1" class="form-check-input" id="completedCheck" @checked(old('completed'))>
    <label class="form-check-label" for="completedCheck">Concluída</label>
  </div>

  <button class="btn btn-primary">Salvar</button>
  <a href="{{ route('tasks.index') }}" class="btn btn-light">Cancelar</a>
</form>
@endsection


