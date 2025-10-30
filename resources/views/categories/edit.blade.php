@extends('layouts.app')

@section('content')
<h1>Editar Categoria</h1>

<form method="POST" action="{{ route('categories.update', $category) }}" class="mt-3">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
  </div>
  <button class="btn btn-primary">Atualizar</button>
  <a href="{{ route('categories.index') }}" class="btn btn-light">Cancelar</a>
</form>
@endsection

