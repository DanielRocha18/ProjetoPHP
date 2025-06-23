<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_logado'])) {

    session_destroy();

    header('Location: /ProjetoPHP/modelo/login.php');
    
    exit();
}
?>