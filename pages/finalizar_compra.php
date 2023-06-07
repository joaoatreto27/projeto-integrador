<?php
    include_once('conexao.php');
    include_once('funcoes.php');

    if ((!isset($_SESSION['email']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login_cliente.php');
    }else{
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (!empty($_SESSION['carrinho'])) {
                $compraId = uniqid();
                $produtoAdicionado = false;
        
                foreach ($_SESSION['carrinho'] as $produto) {
                    $produto['id_compra'] = $compraId;
                    $nomeProduto = $produto['nome_produto'];
                    $marca = $produto['marca'];
                    $quantidade = $produto['quantidade'];
                    $valor = $produto['valor'];
                    $totalProduto = $valor * $quantidade;
        
                    $query = "INSERT INTO pedidos (id_compra, nome_produto, marca, quantidade, total_produto) 
                              VALUES ('$compraId','$nomeProduto', '$marca', $quantidade, $totalProduto)";
        
                    $resultado = mysqli_query($conexao, $query);
        
                    if ($resultado && !$produtoAdicionado) {
                        echo 'Produto adicionado com sucesso.';
                        $produtoAdicionado = true;
                    }
                }
                limparCarrinho();

                header('Location: cliente.php');
                exit();
            } else {
                echo 'O carrinho está vazio.';
            }
        }
    }
?>
