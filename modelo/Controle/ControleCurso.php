<?php
class ControleCurso {
    private $nome_curso, $duracao_curso;

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
