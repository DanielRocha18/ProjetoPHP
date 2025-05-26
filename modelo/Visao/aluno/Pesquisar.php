<?php
require_once '../../Modelo/DAO/MetodoAluno.php';
require_once '../../Controle/ControleAluno.php';

$resultados = [];
$dao = new MetodosAluno();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['matricula'])) {
        $aluno = new ControleAluno();
        $aluno->setMatricula($_POST['matricula']);
        $dao->pesquisarRegistro($aluno);

        $resultados[] = [
            'matricula' => $aluno->getMatricula(),
            'nome' => $aluno->getNomeAluno(),
            'semestre' => $aluno->getSemestre(),
            'idCurso' => $aluno->getIdCurso()
        ];
    } else {
        $todos = $dao->pesquisarTudo();
        foreach ($todos as $aluno) {
            $resultados[] = [
                'matricula' => $aluno->getMatricula(),
                'nome' => $aluno->getNomeAluno(),
                'semestre' => $aluno->getSemestre(),
                'idCurso' => $aluno->getIdCurso()
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pesquisar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Pesquisar Aluno</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula do Aluno</label>
            <input type="number" class="form-control" name="matricula" id="matricula" placeholder="Deixe em branco para listar todos">
        </div>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
        <a href="../index.php" class="btn btn-secondary">Voltar</a>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="mt-5">
            <h4>Resultado da Pesquisa</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Semestre</th>
                        <th>ID Curso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['matricula']) ?></td>
                            <td><?= htmlspecialchars($item['nome']) ?></td>
                            <td><?= htmlspecialchars($item['semestre']) ?></td>
                            <td><?= htmlspecialchars($item['idCurso']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php if (count($resultados) === 0): ?>
                <div class="alert alert-warning">Nenhum resultado encontrado.</div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>