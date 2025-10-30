@extends('layouts.app')

@section('content')
<h1>Categoria: {{ $category->name }}</h1>

<h5 class="mt-4">Tarefas desta categoria</h5>
<ul class="list-group">
  @forelse($category->tasks as $task)
    <li class="list-group-item d-flex justify-content-between">
      <span>
        <strong>{{ $task->title }}</strong>
        @if($task->completed) <span class="badge bg-success">Concluída</span> @endif
        <br><small>{{ $task->description }}</small>
      </span>
      <a class="btn btn-sm btn-outline-primary" href="{{ route('tasks.edit', $task) }}">Abrir</a>
    </li>
  @empty
    <li class="list-group-item">Nenhuma tarefa nesta categoria.</li>
  @endforelse
</ul>
@endsection



