<?php
require_once 'Conexao.php';
require_once __DIR__ . '/../../Controle/ControleUsuario.php';

class MetodoUsuario extends Conexao {

    public function inserir(ControleUsuario $u) {
        $this->abrirBanco();
        
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $stmt->execute([$u->getUsuario()]);

        if ($stmt->fetch()) {
            $this->fecharBanco();
            return 'usuario_existe';
        }

        $senhaHash = password_hash($u->getSenha(), PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO usuario (nome, usuario, senha, data_cadastro) VALUES (?, ?, ?, NOW())");
        
        $sucesso = $stmt->execute([$u->getNome(), $u->getUsuario(), $senhaHash]);
        $this->fecharBanco();

        return $sucesso ? 'cadastro_sucesso' : 'erro_cadastro';
    }

    public function verificarLogin(ControleUsuario $u) {
        $this->abrirBanco();
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $stmt->execute([$u->getUsuario()]);

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($u->getSenha(), $row['senha'])) {
                $u->setIdUsuario($row['id_usuario']);
                $u->setNome($row['nome']);
                $this->fecharBanco();
                return $u;
            }
        }
        
        $this->fecharBanco();
        return null;
    }
}
?>