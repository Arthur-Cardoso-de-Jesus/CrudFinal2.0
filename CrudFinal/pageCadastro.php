<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pageCadastro.css">
    <title>Cadastro</title>
</head>

<body>
    <div id="conteudo">
        <form id="formulario" action="cadastrar.php" method="POST">
            <h1>Cadastro</h1>
            <input class="entrada" id="nome" name="nome" type="text" placeholder="Nome">
            <input class="entrada" id="email" name="email" type="email" placeholder="Email">
            <input class="entrada" id="senha" name="senha" type="password" placeholder="Senha">
            <input class="entrada" id="senhaConfirm" name="senhaConfirm" type="password" placeholder="Confirmar senha">
            <div>
                <input class="botoes" id="enviar" type="submit" value="Enviar">
                <input class="botoes" id="Voltar" type="button" value="Voltar" onclick="location.href='pageLogin.php'">
            </div>
        </form>
    </div>

</body>

</html>