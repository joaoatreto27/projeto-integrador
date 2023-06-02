<?php
    session_start();
    include_once('conexao.php');

    if ((!isset($_SESSION['cnpj']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['cnpj']);
        unset($_SESSION['senha']);
        header('Location: login.php');
        
    
    }else{
        $sql = "SELECT id_mercados FROM mercados WHERE cnpj = '{$_SESSION['cnpj']}'";

        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) == 1) {
            $idMercados = mysqli_fetch_assoc($resultado)['id_mercados'];

            echo ($idMercados);

            if(isset($_POST['submit'])){
                $arquivo = $_FILES['mercado_imagem'];
                $pasta = "imagem_mercado/";
                $nomeArquivo = $arquivo['name'];
                $novoNome = uniqid();
                $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
                
                if($extensao != "jpg" && $extensao != "png"){
                    echo '<script>alert("Arquivo não aceito!");</script>';
                }
                            
                $path = $pasta . $novoNome . "." . $extensao;
                $enviar = move_uploaded_file($arquivo["tmp_name"], $path);

                if($enviar){
                    $result = mysqli_query($conexao,
                    "INSERT INTO imagem_mercado(path_mercado, nome_imagem, id_mercados)
                    VALUES ('$path', '$nomeArquivo', '$idMercados')");
                    
                    echo"Funcionou mais ou menos";

                    header('Location: info.php');
                }else{
                    echo "Error";
                }
            }    
    
        }
    }   

?>