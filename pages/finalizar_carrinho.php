<?php 
    include_once('conexao.php');
    include_once('carrinho.php');
    
    if ((!isset($_SESSION['email']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login_cliente.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Carrinho</title>
</head>
<body>
    <form method="POST" action="finalizar_compra.php">
        <h1>Carrinho de Compras</h1>
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($carrinhoFinal)) {
                    echo '<tr><td colspan="4">O carrinho está vazio.</td></tr>';
                    $total = 0;
                } else {
                    $total = 0;

                    foreach ($carrinhoFinal as $produto) {
                        $valorTotal = $produto['valor'] * $produto['quantidade'];
                        $total += $valorTotal;

                        echo '<tr>';
                        echo '<td>' . $produto['nome_produto'] . ' ' . $produto['marca'] . '</td>';
                        echo '<td>' . $produto['quantidade'] . '</td>';
                        echo '<td>R$ ' . $produto['valor'] . '</td>';
                        echo '<td>R$ ' . $valorTotal . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>

        <p>Total: R$ <?php echo $total; ?></p>

        <button type="submit">Finalizar Compra</button>
    </form>
</body>
</html>
