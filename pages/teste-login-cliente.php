<?php 
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){

        include_once('conexao.php');

        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        //print_r('email: ' . $email);
        //print_r('Senha: ' . $senha);
        if($email == 'admin' && $senha == 'admin'){
            $_SESSION['email'] = $email; 
            $_SESSION['senha'] = $senha; 
            header('Location: administrador.php');
        }else{
            $sql = "SELECT * FROM clientes where email = '$email' and senha = '$senha'";
    
            $result = $conexao->query($sql);
    
            //print_r($result);
            if(mysqli_num_rows($result) < 1){
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                header('Location: login_cliente.php');
            }else{
                $_SESSION['email'] = $email; 
                $_SESSION['senha'] = $senha; 
                header('Location: cliente.php');
            }
        }


    }else{
        header('Location: login_cliente.php');
    }

?>