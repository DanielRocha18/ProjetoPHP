<?php
require_once '../../Modelo/DAO/MetodoCurso.php';
require_once '../../Controle/ControleCurso.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso = new ControleCurso();
    $curso->setNomeCurso($_POST['nomeCurso']);
    $curso->setDuracaoCurso($_POST['duracao']);
    

    $dao = new MetodosCurso();
    $dao->inserir($curso);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Inserir Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
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

<!-- Menu lateral -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">

        <a href="../../index.php" class="menu-link">Início</a>

        <strong class="d-block px-3 mt-3">Alunos</strong>
        <a href="../aluno/inserir.php" class="menu-link">Inserir</a>
        <a href="../aluno/alterar.php" class="menu-link">Alterar</a>
        <a href="../aluno/deletar.php" class="menu-link">Excluir</a>
        <a href="../aluno/pesquisar.php" class="menu-link">Pesquisar</a>

        <strong class="d-block px-3 mt-3">Cursos</strong>
        <a href="inserircurso.php" class="menu-link">Inserir</a>
        <a href="alterarcurso.php" class="menu-link">Alterar</a>
        <a href="deletarcurso.php" class="menu-link">Excluir</a>
        <a href="pesquisarcurso.php" class="menu-link">Pesquisar</a>

        <a href="../join/listarjoin.php" class="menu-link mt-3">Alunos x Cursos</a>

    </div>
</div>

<!-- Conteúdo principal -->
<div class="container mt-4">
    <h2 class="mb-4">Inserir Curso</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Curso</label>
            <input type="text" class="form-control" name="nomeCurso" required>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Duração do curso</label>
            <input type="number" class="form-control" name="duracao" required>
        </div>
        <button type="submit" class="btn btn-primary">Inserir</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
