@extends('layouts.app')

@section('content')
<h1 class="mb-3">Tarefas</h1>

<div class="d-flex align-items-end gap-2 mb-3">
  <form method="GET" action="{{ route('tasks.index') }}" class="row g-2">
    <div class="col-auto">
      <label class="form-label">Filtrar por categoria</label>
      <select name="category_id" class="form-select">
        <option value="">Todas</option>
        @foreach($categories as $c)
          <option value="{{ $c->id }}" @selected($categoryId == $c->id)>{{ $c->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-auto">
      <button class="btn btn-outline-secondary">Filtrar</button>
      <a href="{{ route('tasks.index') }}" class="btn btn-light">Limpar</a>
    </div>
  </form>

  <a href="{{ route('tasks.create') }}" class="btn btn-primary ms-auto">Nova Tarefa</a>
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th><th>Título</th><th>Categoria</th><th>Status</th><th>Criada</th><th class="text-end">Ações</th>
    </tr>
  </thead>
  <tbody>
  @forelse($tasks as $task)
    <tr>
      <td>{{ $task->id }}</td>
      <td><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></td>
      <td>{{ $task->category->name }}</td>
      <td>{!! $task->completed ? '<span class="badge bg-success">Concluída</span>' : '<span class="badge bg-secondary">Pendente</span>' !!}</td>
      <td>{{ $task->created_at->format('d/m/Y H:i') }}</td>
      <td class="text-end">
        <a class="btn btn-sm btn-secondary" href="{{ route('tasks.edit', $task) }}">Editar</a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Remover esta tarefa?');">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Excluir</button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="6">Nenhuma tarefa.</td></tr>
  @endforelse
  </tbody>
</table>

{{ $tasks->links() }}
@endsection


