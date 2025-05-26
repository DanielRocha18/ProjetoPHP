<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Sistema de Gerenciamento</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Alunos</h5>
                        <a href="Visao\aluno\inserir.php" class="btn btn-primary btn-sm">Inserir</a>
                        <a href="Visao\aluno\alterar.php" class="btn btn-warning btn-sm">Alterar</a>
                        <a href="Visao\aluno\deletar.php" class="btn btn-danger btn-sm">Excluir</a>
                        <a href="Visao\aluno\pesquisar.php" class="btn btn-info btn-sm">Pesquisar</a>
                        <a href="Visao\aluno\Pesquisar.php" class="btn btn-success btn-sm">Listar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Cursos</h5>
                        <a href="Visao\curso\inserircurso.php" class="btn btn-primary btn-sm">Inserir</a>
                        <a href="Visao\curso\alterarcurso.php" class="btn btn-warning btn-sm">Alterar</a>
                        <a href="curso/excluir.php" class="btn btn-danger btn-sm">Excluir</a>
                        <a href="curso/pesquisar.php" class="btn btn-info btn-sm">Pesquisar</a>
                        <a href="curso/listar.php" class="btn btn-success btn-sm">Listar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="innerjoin.php" class="btn btn-dark">Visualizar Alunos x Cursos (INNER JOIN)</a>
        </div>
    </div>
</body>
</html>
