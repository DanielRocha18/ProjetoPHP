<?php
require_once 'Conexao.php';
require_once 'ControleInnerJoin.php';

class MetodoInnerJoin extends Conexao {

    public function pesquisarTudo() {
        $this->abrirBanco();
        $sql = "SELECT Alunos.Id_aluno, Alunos.Nome_aluno, Alunos.semestre, Alunos.id_Curso, Curso.Nome_curso
                FROM Alunos
                INNER JOIN Curso ON Alunos.id_Curso = Curso.Id_curso";
        $stmt = $this->pdo->query($sql);
        $result = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $obj = new ControleInnerJoin();
            $obj->setIdAlunoI($row['Id_aluno']);
            $obj->setNomeAlunoI($row['Nome_aluno']);
            $obj->setSemestreAlunoI($row['Semestre']);
            $obj->setAlunoCursoI($row['id_Curso']);
            $obj->setNomeCursoI($row['Nome_curso']);
            $result[] = $obj;
        }

        $this->fecharBanco();
        return $result;
    }
}
?>
