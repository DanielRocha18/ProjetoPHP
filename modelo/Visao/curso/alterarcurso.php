<?php
require_once '../../Modelo/DAO/MetodoCurso.php';
require_once '../../Controle/ControleCurso.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso = new ControleCurso();
    $curso->setNomeCurso($_POST['nome']);
    $curso->setDuracaoCurso($_POST['duracao']);


    $dao = new MetodoCurso();
    $dao->alterarCurso($curso);
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
    <h2 class="mb-4">Apagar Aluno</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Curso</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Nova Duração</label>
            <input type="number" class="form-control" name="duracao" required>
        <button type="submit" class="btn btn-primary">Alterar</button>
        <a href="modelo/index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
