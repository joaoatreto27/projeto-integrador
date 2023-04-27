<?php 
    session_start();
    include_once('conexao.php');

    if ((!isset($_SESSION['cnpj']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['cnpj']);
        unset($_SESSION['senha']);
        header('Location: login.php');
        
    
    }else{            
        if(!empty($_GET['id'])){
            
            $idProduto = $_GET['id'];

            $sqlSelect = "SELECT * FROM produtos WHERE id_produto = $idProduto";

            $result = $conexao->query($sqlSelect);

            if($result -> num_rows > 0){
                while($user_data = mysqli_fetch_assoc($result)){
                    $nome = $user_data['nome_produto'];
                    $valor = $user_data['valor'];
                    $codigoProduto = $user_data['codigo_produto'];
                    $marca = $user_data['marca'];
                    $categoria = $user_data['categoria'];
                }
            }else{
                header('Location: ' . $categoria . '.php');
            }

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/cadastro_produtos.css">
    <title>Cadastro de Produtos</title>
    <script type="text/javascript" src="./../scripts/index.js"></script>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./franqueado.php">Home</a>
                <a href="./cadastro_produtos.php">Cadastrar Produto</a>
                <a href="./filtro.php">Produtos</a>
            </div>
            <div class="buttons">
                <a class="sair-btn" href="./sair.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="form">
            <form action="save_edit_produtos.php" method="POST" enctype="multipart/form-data">
                <label id="nome_produto">Nome do Produto*</label>
                <input type="text" name="nome_produto" value="<?php echo $nome ?>"/>
    
                <label id="valor_produto">Valor*</label>
                <input type="number" name="valor_produto" step="0.01" value= "<?php echo $valor ?>"/>
    
                <label id="codigo_produto">Código do Produto*</label>
                <input type="text" name="codigo_produto" value="<?php echo $codigoProduto ?>"/>
                
                <label id="marca_produto">Marca*</label>
                <input type="text" name="marca_produto" value="<?php echo $marca ?>"/>
                
                <legend>Categoria do Produto*</legend>
                <select name="categoria">
                    <option <?php echo ($categoria == 'Mercearia') ? 'selected' : '' ?>>Mercearia</option>
                    <option <?php echo ($categoria == 'Limpeza') ? 'selected' : '' ?>>Limpeza</option>
                    <option <?php echo ($categoria == 'Bebidas') ? 'selected' : '' ?>>Bebidas</option>
                </select>
                
                <label class="picture" for="image" tabindex="0">Escolha uma imagem para o produto:</label>
                <input type="file" accept="image/*" id="image" class="picture-input" name="imagem" />
                <input type="hidden" name="id_produto" value = <?php echo $idProduto ?>>
                <button class="adicionar-btn" type="submit" name="update" id="update">Atualizar</button>
            </form>
        </div>
    </main>
</body>
</html>