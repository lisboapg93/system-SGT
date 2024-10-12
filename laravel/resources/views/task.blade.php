<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary d-flex justify-content-center" >
        <a class="navbar-brand text-center" href="# ">Sistema Gestão de Tarefas</a>
    </nav>
    <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('home') }}" class="btn btn-outline-danger bbtn-sm" style="margin-top: 10px; margin-right: 15px;">Sair</a>
    </div>
</header>

<body>

<!-- @section('content') -->
<div class="container">
    <h1>Tarefas</h1>
    <!-- Formulário de criação de tarefa -->
    <form id="createTaskForm" action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-1">
            <label for="due_date" class="form-label">Data de Conclusão</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Tarefa</button>
    </form>

    <hr>

    <!-- Filtro de status -->
    <div class="mb-3">
        <label for="filterStatus" class="form-label">Filtrar por Status</label>
        <select id="filterStatus" class="form-select">
            <option value="all">Todas</option>
            <option value="completed">Concluídas</option>
            <option value="not_completed">Não Concluídas</option>
        </select>
    </div>

    <!-- Lista de Tarefas -->
    <div id="taskList">
        @foreach ($tasks as $task)
            <div class="card mb-3 task-card" data-status="{{ $task->is_completed ? 'completed' : 'not_completed' }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text"><small>Data de Conclusão: {{ $task->due_date }}</small></p>
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="is_completed" value="{{ $task->is_completed ? 0 : 1 }}">
                        <button type="submit" class="btn btn-{{ $task->is_completed ? 'warning' : 'success' }}">
                            {{ $task->is_completed ? 'Marcar como Não Concluída' : 'Marcar como Concluída' }}
                        </button>
                    </form>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
</nav>
</div>

<script>
    document.getElementById('filterStatus').addEventListener('change', function() {
        const selectedStatus = this.value;
        document.querySelectorAll('.task-card').forEach(card => {
            const taskStatus = card.getAttribute('data-status');
            card.style.display = (selectedStatus === 'all' || selectedStatus === taskStatus) ? 'block' : 'none';
        });
    });
</script>
</body>
</html>
