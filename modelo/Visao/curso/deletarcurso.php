<?php
require_once '../../Modelo/DAO/MetodoCurso.php';
require_once '../../Controle/ControleCurso.php';

$cursosDAO = new MetodosCurso();
$cursos = $cursosDAO->pesquisarTudo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso = new ControleCurso();
    $curso->setIdCurso($_POST['id_curso']);

    $dao = new MetodosCurso();
    $dao->deletarCurso($curso);
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
    <h2 class="mb-4">Apagar Curso</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="id_curso" class="form-label">Curso</label>
            <select class="form-select" name="id_curso" required>
                <option value="">Selecione um curso</option>
                <?php foreach ($cursos as $curso): ?>
                    <option value="<?= $curso->getIdCurso() ?>">
                        <?= htmlspecialchars($curso->getNomeCurso()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Apagar</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
