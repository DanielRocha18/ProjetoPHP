<?php
require_once 'Conexao.php';
require_once '../../Controle/ControleCurso.php';

class MetodosCurso extends Conexao {

    public function inserir($c) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("SELECT * FROM Curso WHERE Nome_curso = ?");
        $stmt->execute([$c->getNomeCurso()]);

        if ($stmt->fetch()) {
            echo "Esse curso já está cadastrado!";
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO Curso (Nome_curso, Duracao) VALUES (?, ?)");
            $stmt->execute([$c->getNomeCurso(), $c->getDuracaoCurso()]);
            echo "Curso inserido com sucesso!";
        }
        $this->fecharBanco();
    }

    public function deletarCurso($c) {
    $this->abrirBanco();
        $stmt = $this->pdo->prepare("DELETE FROM Curso WHERE Id_curso = ?");
        $stmt->execute([$c->getIdCurso()]);
        echo "Curso deletado com sucesso!";
    $this->fecharBanco();
}


    public function pesquisarRegistro($c) {
    $this->abrirBanco();
    $stmt = $this->pdo->prepare("SELECT * FROM Curso WHERE Nome_curso LIKE ?");
    $stmt->execute(["%" . $c->getNomeCurso() . "%"]);
    
    $resultados = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $curso = new ControleCurso();
        $curso->setIdCurso($row['Id_curso']);
        $curso->setNomeCurso($row['Nome_curso']);
        $curso->setDuracaoCurso($row['Duracao']);
        $resultados[] = $curso;
    }

    $this->fecharBanco();
    return $resultados;
}


    public function pesquisarTudo() {
        $this->abrirBanco();
        $stmt = $this->pdo->query("SELECT * FROM Curso");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $curso = new ControleCurso();
            $curso->setIdCurso($row['Id_curso']);
            $curso->setNomeCurso($row['Nome_curso']);
            $curso->setDuracaoCurso($row['Duracao']);
            $result[] = $curso;
        }
        $this->fecharBanco();
        return $result;
    }

    public function alterarCurso($c) {
    $this->abrirBanco();
    $stmt = $this->pdo->prepare("UPDATE Curso SET Nome_curso = ?, Duracao = ? WHERE Id_curso = ?");
    $stmt->execute([$c->getNomeCurso(), $c->getDuracaoCurso(), $c->getIdCurso()]);
    echo "Curso alterado com sucesso!";
    $this->fecharBanco();
}


}
?>
