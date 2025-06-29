<?php
require_once '../../Modelo/DAO/Conexao.php';
require_once '../../Controle/ControleAluno.php';

class MetodosAluno extends Conexao {

    public function inserir($a) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("SELECT Id_aluno FROM Alunos WHERE Id_aluno = ?");
        $stmt->execute([$a->getIdAluno()]);

        if ($stmt->fetch()) {
            echo "Esse aluno já está cadastrado!";
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO Alunos (Id_aluno, Matricula, Nome_aluno, Semestre, id_Curso) VALUES (NULL, ?, ?, ?, ?)");
            $stmt->execute([$a->getMatricula() ,$a->getNomeAluno(), $a->getSemestre(), $a->getIdCurso()]);
            echo "Aluno inserido com sucesso!";
        }
        $this->fecharBanco();
    }

    public function deletarAluno($a) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("DELETE FROM Alunos WHERE Matricula = ?");
        $stmt->execute([$a->getMatricula()]);
        echo "Aluno deletado com sucesso!";
        $this->fecharBanco();
    }

    public function pesquisarRegistro($a) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("SELECT * FROM Alunos WHERE Matricula = ?");
        $stmt->execute([$a->getMatricula()]);
        if ($row = $stmt->fetch()) {
            $a->setNomeAluno($row['Nome_aluno']);
            $a->setSemestre($row['Semestre']);
            $a->setIdCurso($row['id_Curso']);
        } else {
            echo "Nenhum resultado encontrado!";
        }
        $this->fecharBanco();
    }

    public function pesquisarTudo() {
        $this->abrirBanco();
        $stmt = $this->pdo->query("SELECT * FROM Alunos");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $aluno = new ControleAluno();
            $aluno->setMatricula($row['Matricula']);
            $aluno->setNomeAluno($row['Nome_aluno']);
            $aluno->setSemestre($row['Semestre']);
            $aluno->setIdCurso($row['id_Curso']);
            $result[] = $aluno;
        }
        $this->fecharBanco();
        return $result;
    }

    public function alterarAluno($a) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("UPDATE Alunos SET Nome_aluno = ?, Semestre = ?, id_Curso = ? WHERE Matricula = ?");
        $stmt->execute([$a->getNomeAluno(), $a->getSemestre(), $a->getIdCurso(), $a->getMatricula()]);
        echo "Aluno alterado com sucesso!";
        $this->fecharBanco();
    }
}
?>
