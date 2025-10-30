@extends('layouts.app')

@section('content')
<h1>{{ $task->title }}</h1>

<p class="mb-1"><strong>Categoria:</strong> {{ $task->category->name }}</p>
<p class="mb-1"><strong>Status:</strong> {!! $task->completed ? '<span class="badge bg-success">Concluída</span>' : '<span class="badge bg-secondary">Pendente</span>' !!}</p>
<p class="mt-3">{{ $task->description }}</p>

<a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary">Editar</a>
<a href="{{ route('tasks.index') }}" class="btn btn-light">Voltar</a>
@endsection


