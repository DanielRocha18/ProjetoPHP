<?php
require_once 'Conexao.php';
require_once '../../Controle/ControleCurso.php';

class MetodoCurso extends Conexao {

    public function inserir($c) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("SELECT Nome_curso FROM Curso");
        $stmt->execute();

        if ($stmt->fetch()) {
            echo "Esse curso já está cadastrado!";
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO Curso ( Nome_curso, Duracao) VALUES ( ?, ?)");
            $stmt->execute([$c->getNomeCurso(), $c->getDuracaoCurso()]);
            echo "Curso inserido com sucesso!";
        }
        $this->fecharBanco();
    }

    public function deletarCurso($c) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("DELETE FROM Curso WHERE Nome_curso = ?");
        $stmt->execute([$c->getNomeCurso()]);
        echo "Curso deletado com sucesso!";
        $this->fecharBanco();
    }

    public function pesquisarRegistro($c) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("SELECT * FROM Curso WHERE Nome_curso = ?");
        $stmt->execute([$c->getNomeCurso()]);
        if ($row = $stmt->fetch()) {
            $c->setNomeCurso($row['Nome_curso']);
        } else {
            echo "Nenhum resultado encontrado!";
        }
        $this->fecharBanco();
    }

    public function pesquisarTudo() {
        $this->abrirBanco();
        $stmt = $this->pdo->query("SELECT * FROM Curso");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $curso = new ControleCurso();
            $curso->setNomeCurso($row['Nome_curso']);
            $result[] = $curso;
        }
        $this->fecharBanco();
        return $result;
    }

    public function alterarCurso($c) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("UPDATE Curso SET Duracao = ? WHERE Nome_curso = ?");
        $stmt->execute([$c->getDuracaoCurso(), $c->getNomeCurso()]);
        echo "Curso alterado com sucesso!";
        $this->fecharBanco();
    }
}
?>
