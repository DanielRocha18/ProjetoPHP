<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gerenciamento - Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }
        .offcanvas-start {
            width: 250px;
            background-color: #343a40;
            color: white;
        }
        .offcanvas-title {
            color: white;
        }
        .menu-link {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .menu-link:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>

    <!-- Navbar superior -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                ☰ Menu
            </button>
            <span class="navbar-text text-white">
                Sistema de Gerenciamento
            </span>
        </div>
    </nav>

    <!-- Menu lateral (offcanvas) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <a href="modelo/index.php" class="menu-link">Início</a>
            <strong class="d-block px-3 mt-3">Alunos</strong>
            <a href="modelo/Visao/aluno/inserir.php" class="menu-link">Inserir</a>
            <a href="modelo/Visao/aluno/alterar.php" class="menu-link">Alterar</a>
            <a href="modelo/Visao/aluno/deletar.php" class="menu-link">Excluir</a>
            <a href="modelo/Visao/aluno/pesquisar.php" class="menu-link">Pesquisar</a>

            <strong class="d-block px-3 mt-3">Cursos</strong>
            <a href="modelo/Visao/curso/inserircurso.php" class="menu-link">Inserir</a>
            <a href="modelo/Visao/curso/alterarcurso.php" class="menu-link">Alterar</a>
            <a href="modelo/Visao/curso/deletarcurso.php" class="menu-link">Excluir</a>
            <a href="modelo/Visao/curso/pesquisarcurso.php" class="menu-link">Pesquisar</a>

            <a href="modelo/Visao/join/listarjoin.php" class="menu-link mt-3">📑 Alunos x Cursos</a>
        </div>
    </div>

    <!-- Conteúdo principal -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Crie sua Conta</h3>
                        
                        <?php if(isset($_SESSION['status_cadastro']) && $_SESSION['status_cadastro'] == 'usuario_existe'): ?>
                        <div class="alert alert-warning" role="alert">
                            O usuário escolhido já existe. Tente outro.
                        </div>
                        <?php unset($_SESSION['status_cadastro']); endif; ?>

                        <form action="auth_controller.php" method="POST">
                            <input type="hidden" name="acao" value="register">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuário</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        <hr>
                        <p class="text-center mb-0">Já tem uma conta? <a href="login.php">Faça o login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
