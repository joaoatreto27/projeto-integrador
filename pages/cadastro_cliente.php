<?php 
    if(isset($_POST['submit'])){
        include_once('./conexao.php');

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $dataNasc = $_POST['data_nasc'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conexao, "INSERT INTO clientes(nome, cpf, email, telefone, data_nasc, senha)
        VALUES ('$nome', '$cpf', '$email', '$telefone', '$dataNasc', '$senha')");

        header('Location: login_cliente.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/cadastro_cliente.css">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <main>
        <div class="card-login">
            <h1>Faça o cadastro</h1>
            <p>Preencha o formulário abaixo para se cadastrar</p>
            <form action="cadastro_cliente.php" method="POST">
                <div class="inputs">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="nome" id="nome">

                    <label id="cpf">CPF</label>
                    <input name="cpf" type="text" placeholder="000.000.000-00" 
                    oninput="this.value = mascaraCPF(this.value)" maxlength="14" />
                    
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="exe@dominio.com">
                    
                    <div class="row">
                        <div>
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" oninput="this.value = mascaraTelefone(this.value)" 
                            maxlength="15" placeholder="(55)00000-0000">
                        </div>
                        <div>
                            <label for="data_nasc">Data de Nascimento</label>
                            <input type="date" id="data_nasc" name="data_nasc">
                        </div>
                    </div>
                    
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha">
                    
                    <button class="entrar-btn" type="submit" name="submit">Cadastrar</button>
                </div>    
            </form>
        </div>
    </main>
    <script src="./../scripts/mascaras.js"></script>
</body>
</html>