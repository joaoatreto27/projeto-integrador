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
            <h1>Faça o login como cliente</h1>
            <form action="teste-login-cliente.php" method="POST">
                <div class="inputs">
                    <label id="email">Email</label>
                    <input name="email" type="text" placeholder="Digite seu email..." />
                    <label id="senha">Senha</label>
                    <input name="senha" type="password" placeholder="Digite sua senha..."/>
                    <button class="entrar-btn" type="submit" name="submit">Entrar</button>
                    <p>Deseja logar como franqueado? <a href="./login.php">Clique Aqui!</a></p>
                    <p>Não possui uma conta? <a href="./cadastro_cliente.php">Cadastre-se!</a></p>
                </div>    
            </form>
        </div>
    </main>
    <script src="./../scripts/mascaras.js"></script>
</body>
</html>