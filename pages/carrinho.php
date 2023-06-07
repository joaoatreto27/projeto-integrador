<?php
    include_once('conexao.php');
    session_start();

    $carrinhoFinal = $_SESSION['carrinho'];

    if (isset($_POST['remover_produto'])) {
        $idProduto = $_POST['id_produto'];
        $idMercado = $_POST['idMercado'];
    
        $indice = -1;
        foreach ($_SESSION['carrinho'] as $index => $produto) {
            if ($produto['id_produto'] == $idProduto) {
                $indice = $index;
                break;
            }
        }
    
        if ($indice != -1) {
            unset($_SESSION['carrinho'][$indice]);
        }

        $_SESSION['carrinho_serializado'] = serialize($carrinhoFinal);
    
        header('Location: mercado.php?id=' . $idMercado);
        exit();
    }

    if (isset($_POST['id'])) {
        $idProduto = $_POST['id'];
        $idMercado = $_POST['idMercado'];
        $quantidade = $_POST['quantidade'];

        $query = "SELECT * FROM produtos WHERE id_produto = $idProduto";
        $result = mysqli_query($conexao, $query);
        $produto = mysqli_fetch_assoc($result);
        $total = 0;
        
        if ($produto) {
            $produtoEncontrado = false;
            foreach ($_SESSION['carrinho'] as & $produtoCarrinho) {
                if ($produtoCarrinho['id_produto'] == $idProduto) {
                    $produtoCarrinho['quantidade'] += $quantidade;
                    $produtoEncontrado = true;
                    break;
                }
            }

            if (!$produtoEncontrado) {
                $produto['quantidade'] = $quantidade;
                $_SESSION['carrinho'][] = $produto;
            }

            $_SESSION['carrinho_serializado'] = serialize($carrinhoFinal);
            
            $total += $produto['valor'];
            header('Location: mercado.php?id=' . $idMercado);
        } else {
            echo 'Produto não encontrado.';
        }

        mysqli_close($conexao);
    }
?>
