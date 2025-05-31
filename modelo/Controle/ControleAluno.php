<?php
class ControleAluno {
    private $id_aluno, $nome_aluno, $semestre, $id_curso, $matricula;

    public function getIdAluno() {
        return $this->id_aluno;
    }
    public function setIdAluno($id) {
        $this->id_aluno = $id;
    }

    public function getNomeAluno() {
        return $this->nome_aluno;
    }
    public function setNomeAluno($nome) {
        $this->nome_aluno = $nome;
    }

    public function getSemestre() {
        return $this->semestre;
    }
    public function setSemestre($semestre) {
        $this->semestre = $semestre;
    }

    public function getIdCurso() {
        return $this->id_curso;
    }
    public function setIdCurso($curso) {
        $this->id_curso = $curso;
    }

    public function getMatricula() {
        return $this->matricula;
    }
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }
}
?>
