@extends('layouts.app')

@section('content')
<h1 class="mb-3">Categorias</h1>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nova Categoria</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th><th>Nome</th><th>Criada em</th><th class="text-end">Ações</th>
    </tr>
  </thead>
  <tbody>
  @forelse($categories as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></td>
      <td>{{ $category->created_at->format('d/m/Y H:i') }}</td>
      <td class="text-end">
        <a class="btn btn-sm btn-secondary" href="{{ route('categories.edit', $category) }}">Editar</a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Remover esta categoria? Tarefas vinculadas serão apagadas.');">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Excluir</button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="4">Nenhuma categoria.</td></tr>
  @endforelse
  </tbody>
</table>

{{ $categories->links() }}
@endsection


