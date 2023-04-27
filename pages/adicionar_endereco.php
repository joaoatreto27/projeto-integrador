<?php 
    session_start();
    include_once('conexao.php');

    if ((!isset($_SESSION['email']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login_cliente.php');
    }else{
        $sql = "SELECT id_clientes FROM clientes WHERE email = '{$_SESSION['email']}'";

        //echo $sql;

        $resultado = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($resultado) == 1){
            $idCliente = mysqli_fetch_assoc($resultado)['id_clientes'];

            //echo $idCliente;

            if(isset($_POST['submit'])){
                $cidade = $_POST['cidade'];
                $uf = $_POST['uf'];
                $numero = $_POST['numero'];
                $rua = $_POST['rua'];
                $bairro = $_POST['bairro'];
                $cep = $_POST['cep'];
                $complemento = $_POST['complemento'];
                $pontoRef = $_POST['ponto_ref'];

                $result = mysqli_query($conexao, "INSERT INTO endereco_cliente(cidade, uf, numero, rua, bairro, cep, complemento, ponto_ref, id_clientes)
                VALUES('$cidade', '$uf', '$numero', '$rua', '$bairro', '$cep', '$complemento', '$pontoRef', '$idCliente')");
            
                header('Location: info_cliente.php');
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
    <link rel="stylesheet" href="./../styles/adicionar_endereco.css">
    <title>Clientes</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./cliente.php">Home</a>
                <a href="./info_cliente.php">Informações Pessoais</a>
            </div>
            <div class="buttons">
                <a class="sair-btn" href="./sair.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="card">
            <form action="adicionar_endereco.php" method="POST">
                <div class="row">
                    <div class="column">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Erechim">
                    </div>
    
                    <div class="column">
                        <label for="uf">UF</label>
                        <input type="text" name="uf" id="uf" placeholder="RS" maxlength="2">
                    </div>
                    
                    <div class="column">
                        <label for="numero">Número</label>
                        <input type="text" name="numero" id="numero" placeholder="123">
                    </div>
                </div>
                
                <div class="row rua-bairro">
                    <div class="column">
                        <label for="rua">Rua</label>
                        <input type="text" name="rua" id="rua" placeholder="Pedro Alvares Cabral">
                    </div>
    
                    <div class="column">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Centro">
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" placeholder="12345-000" oninput="this.value = mascaraCep(this.value)" maxlength="9">
                    </div>

                    <div class="column">
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" id="complemento" placeholder="Apto. 49">
                    </div>
                </div>

                <div class="column">
                    <label for="ponto_ref">Ponto de Referência</label>
                    <input type="text" name="ponto_ref" id="ponto_ref">
                </div>
                <button class="add-endereco" name="submit" type="submit">Adicionar Endereço<i class="fa-solid fa-check"></i></i></button>
            </form>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/c1c43739d0.js" crossorigin="anonymous"></script>
    <script src="./../scripts/mascaras.js"></script>
</body>
</html>