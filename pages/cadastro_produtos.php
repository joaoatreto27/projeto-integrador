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
        
            //echo($idMercados);

            if(isset($_POST['submit'])){
                $nome = $_POST['nome_produto'];
                $valor = $_POST['valor_produto'];
                $codigoProduto = $_POST['codigo_produto'];
                $marca = $_POST['marca_produto'];
                $categoria = $_POST['categoria'];
                
                //ADICIONANDO IMAGEM
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
                
                if($enviar){
                    $result = mysqli_query($conexao,
                    "INSERT INTO produtos(nome_produto, valor, codigo_produto, marca, categoria, path, nome_imagem, id_mercados)
                    VALUES ('$nome', '$valor', '$codigoProduto', '$marca', '$categoria', '$path', '$nomeArquivo', '$idMercados')");
                }
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
            <form action="cadastro_produtos.php" method="POST" enctype="multipart/form-data">
                <label id="nome_produto">Nome do Produto*</label>
                <input type="text" name="nome_produto"/>
    
                <label id="valor_produto">Valor*</label>
                <input type="number" name="valor_produto" step="0.01"/>
    
                <label id="codigo_produto">Código do Produto*</label>
                <input type="text" name="codigo_produto"/>
                
                <label id="marca_produto">Marca*</label>
                <input type="text" name="marca_produto"/>
                
                <legend>Categoria do Produto*</legend>
                <select name="categoria">
                    <option>Mercearia</option>
                    <option>Limpeza</option>
                    <option>Bebidas</option>
                </select>
                
                <label class="picture" for="image" tabindex="0">Escolha uma imagem para o produto:</label>
                <input type="file" accept="image/*" id="image" class="picture-input" name="imagem" />
                
                <button class="adicionar-btn" type="submit" name="submit">Adicionar</button>
            </form>
        </div>
    </main>
</body>
</html>