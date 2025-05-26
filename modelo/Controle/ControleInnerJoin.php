<?php
class ControleInnerJoin {
    private $id_alunoI, $nome_alunoI, $semestre_alunoI, $aluno_cursoI, $nome_cursoI;

    public function getIdAlunoI() {
        return $this->id_alunoI;
    }
    public function setIdAlunoI($idI) {
        $this->id_alunoI = $idI;
    }

    public function getNomeAlunoI() {
        return $this->nome_alunoI;
    }
    public function setNomeAlunoI($nomeI) {
        $this->nome_alunoI = $nomeI;
    }

    public function getSemestreAlunoI() {
        return $this->semestre_alunoI;
    }
    public function setSemestreAlunoI($semestreI) {
        $this->semestre_alunoI = $semestreI;
    }

    public function getAlunoCursoI() {
        return $this->aluno_cursoI;
    }
    public function setAlunoCursoI($cursoI) {
        $this->aluno_cursoI = $cursoI;
    }

    public function getNomeCursoI() {
        return $this->nome_cursoI;
    }
    public function setNomeCursoI($nomeCursoI) {
        $this->nome_cursoI = $nomeCursoI;
    }
}
?>
