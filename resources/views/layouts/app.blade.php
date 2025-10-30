<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TaskHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light mb-4">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('tasks.index') }}">
      <img src="{{ asset('images/taskhub-logo.png') }}" alt="TaskHub" class="logo me-2">
      <span class="logo-text">TaskHub</span>
    </a>
    <div>
      <a class="nav-link d-inline text-white" href="{{ route('tasks.index') }}">Listar Tarefas</a>
        <span class="mx-2 text-secondary">|</span>
      <a class="nav-link d-inline text-white" href="{{ route('tasks.create') }}">Nova Tarefa</a>
        <span class="mx-2 text-secondary">|</span>
      <a class="nav-link d-inline text-white" href="{{ route('categories.index') }}">Categorias</a>
        <span class="mx-2 text-secondary">|</span>
      <a class="nav-link d-inline text-white" href="{{ route('categories.create') }}">Nova Categoria</a>
    </div>
  </div>
</nav>

<main class="container">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @yield('content')
</main>

<footer class="app-footer py-4 mt-5">
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start">
  <div class="mt-3 mt-md-0">
      <small class="text-muted">
        © {{ date('2025') }} TaskHub — Developed by MVx Enterprise.
      </small>
    </div>
  </div>
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
