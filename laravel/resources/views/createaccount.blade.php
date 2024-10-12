<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary d-flex justify-content-center" >
        <a class="navbar-brand text-center" href="# ">Sistema Gestão de Tarefas</a>
    </nav>
</header>
<body>
    <!-- Container para o formulário -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4" style="width: 100%; max-width: 500px; border-radius: 30px; background-color: #EAECEE;">
            <h3 class="card-title text-center mb-4">Cadastrar Conta</h3>
            <form action="{{ route('register') }}" method="GET">
            @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" placeholder="Digite seu nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Digite seu email" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
                </div>
                <a href="{{ route('register') }}"  class="btn btn-success btn-block">Criar Conta</a>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-block">Voltar</a>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
