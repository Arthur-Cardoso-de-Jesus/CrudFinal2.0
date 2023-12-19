<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css\pageLogin.css">
    <title>Login</title>
</head>
<body>
<div id="conteudo">
    <form action="login.php" id="formulario" method="POST">
        <h1>LOGIN</h1>
        <input class="entrada" id="email" name="email" type="text" placeholder="Email">
        <input class="entrada" id="senha" name="senha" type="senha" placeholder="Senha">
        <div>
        <input class="botoes" id="enviar" type="submit" placeholder="Teste">
        <input class="botoes" type="button" value="Criar conta" onclick="location.href='pageCadastro.php'">
        </div>
    </form>
</div>

</body>
</html>