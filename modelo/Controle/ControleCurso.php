<?php
class ControleCurso {
    private $id_curso, $nome_curso, $duracao_curso;

    public function getIdCurso() {
        return $this->id_curso;
    }
    public function setIdCurso($id) {
        $this->id_curso = $id;
    }

    public function getNomeCurso() {
        return $this->nome_curso;
    }
    public function setNomeCurso($nome) {
        $this->nome_curso = $nome;
    }

    public function getDuracaoCurso() {
        return $this->duracao_curso;
    }
    public function setDuracaoCurso($duracao) {
        $this->duracao_curso = $duracao;
    }
}
?>
