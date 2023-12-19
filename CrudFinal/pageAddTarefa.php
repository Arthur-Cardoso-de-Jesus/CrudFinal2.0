<?
   
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pageAddTare.css">
    <title>Cadastro</title>
</head>
<body>
<div id="conteudo">
    <form id="formulario" action="cadTarefas.php" method="POST">
        <h1>Adicionar tarefa</h1>
        <input class="entrada"  name="titulo" type="text" placeholder="Titulo">
        <input class="entrada"  name="descricao" type="text" placeholder="Descrição">
        <input class="entrada"  name="data" type="date" placeholder="Data">
        <div>
        <input class="botoes" id="enviar" type="submit" value="Enviar">
        <input class="botoes" id="Voltar" type="button" value="Voltar" onclick="location.href='pageTarefas.php'">
        </div>
    </form>
</div>

</body>
</html>