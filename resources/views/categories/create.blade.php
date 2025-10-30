@extends('layouts.app')

@section('content')
<h1>Nova Categoria</h1>

<form method="POST" action="{{ route('categories.store') }}" class="mt-3">
  @csrf
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
  </div>
  <button class="btn btn-primary">Salvar</button>
  <a href="{{ route('categories.index') }}" class="btn btn-light">Cancelar</a>
</form>
@endsection
