<?php 
    session_start();
    unset($_SESSION['cnpj']);
    unset($_SESSION['senha']);
    header('Location: index.php')
?>