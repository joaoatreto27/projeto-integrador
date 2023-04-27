<?php

    if(isset($_POST['submit'])){

        include_once('conexao.php');

        $nome = $_POST['razao_social'];
        $cnpj = $_POST['cnpj'];
        $inscricao_estadual = $_POST['inscricao_estadual'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $cidade = $_POST['cidade'];
        $numero = $_POST['numero'];
        $cep = $_POST['cep'];
        $uf = $_POST['uf'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];

        $result = mysqli_query($conexao, "INSERT INTO mercados(nome, cnpj, inscricao_estadual, email, telefone, senha,
        cidade, numero, cep, uf, bairro, rua)
        VALUES ('$nome', '$cnpj', '$inscricao_estadual', '$email', '$telefone', '$senha', '$cidade', 
        '$numero', '$cep', '$uf', '$bairro',  '$rua')");

        header('Location: login.php');
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <div class="card-cadastro">
        <form action="cadastro.php" method="POST">
        <div class="card-cadastro">
            <div class="inputs">
                <div class="info">
                    <h2>Informações</h2>
                    <div class="input-column">
                        <label id="razao_social">Razão Social*</label>
                        <input name="razao_social" type="text" placeholder="Ex: SuperMercado" />
                    </div>
                    <div class="input-row">
                        <div class="input-column">
                            <label id="cnpj">CNPJ*</label>
                            <input name="cnpj" type="text" id="cnpj-inp" oninput="this.value = mascaraCnpj(this.value)" 
                            maxlength="18"  placeholder="12.345.678/0001-90"/>
                        </div>
                        
                        <div class="input-column">
                            <label id="inscricao_estadual">Inscrição Estadual*</label>
                            <input name="inscricao_estadual" type="text" placeholder="123456789" />
                        </div>
                    </div>
                    
                    
                    <div class="input-column">
                        <label id="email">Email*</label>                
                        <input name="email" type="email" placeholder="exe@dominio.com" />
                    </div>
                    
                    <div class="input-row">
                        <div class="input-column">
                            <label id="telefone">Telefone*</label>
                            <input name="telefone" type="tel" id="telefone-inp" oninput="this.value = mascaraTelefone(this.value)" 
                            maxlength="15" placeholder="(55)00000-0000"/>
                        </div>
                        <div class="input-column">
                            <label id="senha">Senha*</label>
                            <input name="senha" type="password"/>
                        </div>
                    </div>
                </div>

                <div class="endereco">
                    <h2>Endereço</h2>
                    <div class="input-column">
                        <label id="cidade">Cidade*</label>
                        <input name="cidade" class="cidade-input" type="text" placeholder="Ex: Erechim" />    
                    </div>
                    
                    <div class="input-row">
                        <div class="input-column">
                            <label id="numero">Número*</label>
                            <input name="numero" class="numero-input" type="text" placeholder="Ex: 123"/>                
                        </div>
                        <div class="input-column">
                            <label id="cep">CEP*</label>
                            <input name="cep" class="cep-input" type="text" id="cep-inp" oninput="this.value = mascaraCep(this.value)"
                            maxlength="9" placeholder="Ex: 12345-000" />
                        </div>
                        <div class="input-column">
                            <label id="uf">UF*</label>
                            <input name="uf" class="uf-input" type="text" maxlength="2" placeholder="Ex: RS"/>
                        </div>
                    </div>

                    <div class="input-column">
                        <label id="bairro">Bairro*</label>
                        <input name="bairro" type="text" placeholder="Ex: Centro"/>
                    </div>
                    
                    <div class="input-column">
                        <label id="rua">Rua*</label>
                        <input name="rua" type="text" placeholder="Ex: Pedro Alvares Cabral"/>
                    </div>
                    
                </div>

            </div>  
            <div class="button">
                <button class="cadastrar-btn" name="submit" type="submit" href="./login.html">Cadastrar</button>
            </div>  
        </div>
        </form>
        </div>
    </main>
    <script src="./../scripts/mascaras.js"></script>
</body>
</html>