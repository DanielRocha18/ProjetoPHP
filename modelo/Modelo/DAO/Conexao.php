<?php
class Conexao {
    protected $pdo;

    public function abrirBanco() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_crud", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    public function fecharBanco() {
        $this->pdo = null;
    }
}
?>
