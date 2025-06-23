<?php
require_once '../../verifica_login.php';
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
        <a href="inserir.php" class="menu-link">Inserir</a>
        <a href="alterar.php" class="menu-link">Alterar</a>
        <a href="deletar.php" class="menu-link">Excluir</a>
        <a href="pesquisar.php" class="menu-link">Pesquisar</a>

        <strong class="d-block px-3 mt-3">Cursos</strong>
        <a href="../curso/inserircurso.php" class="menu-link">Inserir</a>
        <a href="../curso/alterarcurso.php" class="menu-link">Alterar</a>
        <a href="../curso/deletarcurso.php" class="menu-link">Excluir</a>
        <a href="../curso/pesquisarcurso.php" class="menu-link">Pesquisar</a>

        <a href="../join/listarjoin.php" class="menu-link mt-3">Alunos x Cursos</a>

        <a href="../../logout.php" onclick="return confirm('Tem certeza que deseja sair?');" class="menu-link mt-5 text-danger border-top border-secondary pt-3"><strong>Sair</strong></a>

    </div>
</div>

<!-- Conteúdo principal -->
<div class="container mt-4">
    <h2 class="mb-4">Pesquisar Aluno</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula do Aluno</label>
            <input type="number" class="form-control" name="matricula" id="matricula" placeholder="Deixe em branco para listar todos">
        </div>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>