<?php
session_start();
// Caminhos de inclusão de arquivos PHP (estão corretos com __DIR__)
require_once __DIR__ . '/Modelo/DAO/MetodoUsuario.php';
require_once __DIR__ . '/Controle/ControleUsuario.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['acao'])) {
    // CORREÇÃO: O caminho correto para login.php
    header('Location: /ProjetoPHP/modelo/login.php');
    exit();
}

$acao = $_POST['acao'];
$dao = new MetodoUsuario();
$usuarioController = new ControleUsuario();

if ($acao == 'login') {
    if (empty($_POST['usuario']) || empty($_POST['senha'])) {
        // CORREÇÃO: O caminho correto para login.php
        header('Location: /ProjetoPHP/modelo/login.php');
        exit();
    }

    $usuarioController->setUsuario(trim($_POST['usuario']));
    $usuarioController->setSenha(trim($_POST['senha']));
    
    $usuarioLogado = $dao->verificarLogin($usuarioController);

    if ($usuarioLogado) {
        $_SESSION['usuario_logado'] = $usuarioLogado->getNome();
        $_SESSION['id_usuario'] = $usuarioLogado->getIdUsuario();
        // Este caminho está correto
        header('Location: /ProjetoPHP/modelo/index.php'); 
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        // CORREÇÃO: O caminho correto para login.php
        header('Location: /ProjetoPHP/modelo/login.php');
        exit();
    }

} elseif ($acao == 'register') {
    if (empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['senha'])) {
        // CORREÇÃO: O caminho correto para register.php
        header('Location: /ProjetoPHP/modelo/register.php');
        exit();
    }

    $usuarioController->setNome(trim($_POST['nome']));
    $usuarioController->setUsuario(trim($_POST['usuario']));
    $usuarioController->setSenha(trim($_POST['senha']));

    $resultado = $dao->inserir($usuarioController);

    if ($resultado === 'cadastro_sucesso') {
        $_SESSION['status_cadastro'] = 'sucesso';
        // CORREÇÃO: O caminho correto para login.php
        header('Location: /ProjetoPHP/modelo/login.php');
        exit();
    } elseif ($resultado === 'usuario_existe') {
        $_SESSION['status_cadastro'] = 'usuario_existe';
        // CORREÇÃO: O caminho correto para register.php
        header('Location: /ProjetoPHP/modelo/register.php');
        exit();
    }
}
?>