<?php 

    if(isset($_POST['update'])){
        include_once('conexao.php');

        $id = $_POST['id_produto'];
        $nome = $_POST['nome_produto'];
        $valor = $_POST['valor_produto'];
        $codigoProduto = $_POST['codigo_produto'];
        $marca = $_POST['marca_produto'];
        $categoria = $_POST['categoria'];

        $arquivo = $_FILES['imagem'];
        $pasta = "produtos/";
        $nomeArquivo = $arquivo['name'];
        $novoNome = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        if($extensao != "jpg" && $extensao != "png"){
            echo '<script>alert("Arquivo não aceito!");</script>';
        }
            

        $path = $pasta . $novoNome . "." . $extensao;
        $enviar = move_uploaded_file($arquivo["tmp_name"], $path);         

        $sqlUpdate = "UPDATE produtos SET nome_produto = '$nome', valor = '$valor', codigo_produto = '$codigoProduto', 
        marca = '$marca', categoria = '$categoria', path = '$path', nome_imagem = '$nomeArquivo' WHERE id_produto = '$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location:' . $categoria . '.php');

?>