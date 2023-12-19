<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index1.css">
    <title>Menu</title>
</head>
<body>
    <div id="header">
    <h1>Tarefas unlimited</h1>
    </div>
    <div id="content">

        <?php
         session_start();

         if (!isset($_SESSION["id"])) {
             header("Location: pageLogin.php");
             exit();
         }
         

        // Pega os dados da sessão
        $adm = $_SESSION['id'];
        $nome = $_SESSION['nome'];

        echo"<h1>Bem vindo $nome!</h1>";

       
      
        // Verifica se é adm e mostra as opções adequadas!
        if($adm > 0){
            echo"<button class='botoes' onclick='location.href=\"pageUsuarios.php\"' id='btnUsuarios'>Usuarios</button>";
            echo"<button class='botoes' onclick='location.href=\"pageTarefas.php\"' id='btnTarefas'>Tarefas</button>";
            echo"<button class='botoes' onclick='location.href=\"pageApi.php\"' id='btnApi'>API</button>";
            echo"<button class='botoes' onclick='location.href=\"logout.php\"' id='logout'>Sair</button>";
        }else{
            echo"<button onclick='location.href=\"pageTarefas.php\"' id='btnTarefas'>Tarefas</button>";
            echo"<button class='botoes' onclick='location.href=\"pageApi.php\"' id='btnApi'>API</button>";
            echo"<button class='botoes' onclick='location.href=\"logout.php\"' id='logout'>Sair</button>";
        }
        
        ?>

    </div>

</body>
</html>