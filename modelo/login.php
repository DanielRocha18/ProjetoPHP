<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gerenciamento - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 0.75rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">
                Sistema de Gerenciamento
            </span>
        </div>
    </nav>

    <div class="container login-container">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title text-center mb-4">Acessar o Sistema</h3>
                    
                    <?php if(isset($_SESSION['nao_autenticado'])): ?>
                    <div class="alert alert-danger" role="alert">
                        ERRO: Usuário ou senha inválidos.
                    </div>
                    <?php unset($_SESSION['nao_autenticado']); endif; ?>
                    
                    <?php if(isset($_SESSION['status_cadastro']) && $_SESSION['status_cadastro'] == 'sucesso'): ?>
                    <div class="alert alert-success" role="alert">
                        Cadastro efetuado com sucesso! Faça o login.
                    </div>
                    <?php unset($_SESSION['status_cadastro']); endif; ?>

                    <form action="auth_controller.php" method="POST">
                        <input type="hidden" name="acao" value="login">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuário</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                    <hr>
                    <p class="text-center mb-0">Não tem uma conta? <a href="register.php">Cadastre-se aqui</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>