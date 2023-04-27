<?php 
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['cnpj']) && !empty($_POST['senha'])){

        include_once('conexao.php');
        $cnpj = $_POST['cnpj'];
        $senha = $_POST['senha'];

        //print_r('CNPJ: ' . $cnpj);
        //print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM mercados where cnpj = '$cnpj' and senha = '$senha'";

        $result = $conexao->query($sql);

        //print_r($result);
        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['cnpj']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }else{
            $_SESSION['cnpj'] = $cnpj; 
            $_SESSION['senha'] = $senha; 
            header('Location: franqueado.php');
        }

    }else{
        header('Location: login.php');
    }

?>