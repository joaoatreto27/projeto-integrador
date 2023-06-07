<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/login.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="card-login">
            <h1>Faça o login como franqueado</h1>
            <form action="teste-login.php" method="POST">
                <div class="inputs">
                    <label id="cnpj">CNPJ</label>
                    <input name="cnpj" type="text" placeholder="Digite seu CNPJ..." 
                    oninput="this.value = mascaraCnpj(this.value)" maxlength="18" />
                    <label id="senha">Senha</label>
                    <input name="senha" type="password" placeholder="Digite sua senha..."/>
                    <button class="entrar-btn" type="submit" name="submit">Entrar</button>
                    <p>Deseja logar como cliente? <a href="./login_cliente.php">Clique Aqui!</a></p>
                    <p>Não possui uma conta? <a href="./cadastro.php">Cadastre-se!</a></p>
                </div>    
            </form>
        </div>
    </main>
    <script src="./../scripts/mascaras.js"></script>
</body>
</html>