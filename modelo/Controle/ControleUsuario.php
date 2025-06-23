<?php
class ControleUsuario {
    private $id_usuario, $nome, $usuario, $senha;

    public function getIdUsuario() {
        return $this->id_usuario;
    }
    public function setIdUsuario($id) {
        $this->id_usuario = $id;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getUsuario() {
        return $this->usuario;
    }
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
}
?>