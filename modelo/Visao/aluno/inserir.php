<?php
require_once '../../Modelo/DAO/MetodoAluno.php';
require_once '../../Controle/ControleAluno.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aluno = new ControleAluno();
    $aluno->setMatricula($_POST['matricula']);
    $aluno->setNomeAluno($_POST['nome']);
    $aluno->setSemestre($_POST['semestre']);
    $aluno->setIdCurso($_POST['curso']);

    $dao = new MetodosAluno();
    $dao->inserir($aluno);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Inserir Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Inserir Aluno</h2>
    <form method="POST">
    <div class="mb-3">
            <label for="nome" class="form-label">Matricula do Aluno</label>
            <input type="number" class="form-control" name="matricula" required>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Aluno</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre</label>
            <input type="number" class="form-control" name="semestre" required>
        </div>
        <div class="mb-3">
            <label for="curso" class="form-label">Nome do Curso</label>
            <input type="text" class="form-control" name="curso" required>
        </div>
        <button type="submit" class="btn btn-primary">Inserir</button>
        <a href="modelo/index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
