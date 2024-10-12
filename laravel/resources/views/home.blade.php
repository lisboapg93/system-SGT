<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary d-flex justify-content-center" >
        <a class="navbar-brand text-center" href="# ">Sistema Gestão de Tarefas</a>
    </nav>
</header>
<body>
    <!-- Container -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="width: 100%; max-width: 400px; border-radius: 30px; background-color: #EAECEE;">
            <h3 class="card-title text-center mb-4">Login</h3>
            <form>
                <div class="form-group" style="border-radius: 30px;">
                    <label for="username">Usuário</label>
                    <input type="text" class="form-control" id="username" placeholder="Digite seu usuário">
                </div>
                <div class="form-group" style="border-radius: 30px;">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" placeholder="Digite sua senha">
                </div>
                <a href="{{ route('tasks') }}" class="btn btn-success btn-block">Entrar</a>
                <a href="{{ route('users.create') }}" class="btn btn-info btn-block">Criar Cadastro</a>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
