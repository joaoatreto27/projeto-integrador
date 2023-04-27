<?php 

    if(!empty($_GET['id'])){

        include_once('conexao.php');

        $idProduto = $_GET['id'];

        $sqlSelect = "SELECT * FROM produtos WHERE id_produto = $idProduto";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            $sqlDelete = "DELETE FROM produtos WHERE id_produto = $idProduto";
            $resultDelete = $conexao->query($sqlDelete);

            header('Location: filtro.php');
        }
    }

?>