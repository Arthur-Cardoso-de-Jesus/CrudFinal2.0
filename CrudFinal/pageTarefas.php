<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pageTarefas.css">
    <title>Tarefas</title>
</head>

<body>
    <div id="header">
        <div id="menu">
            <input class="botoes" id="Menu" type="button" onclick="location.href='index.php'" value="Menu">
            <input class="botoes" id="logout" type="button" onclick="location.href='logout.php'" value="Sair">
        </div>
    </div>

    <div id="conteudo">

        <div id="coisas">
            <h1>Tarefas:</h1>
            <input id="btnAdicionar" type="button" onclick="location.href='pageAddTarefa.php'" value="Adicionar tarefa!">

            <table>

                <?php
                session_start();
                include("config.php");

                
                if (!isset($_SESSION["id"])) {
                    header("Location: pageLogin.php");
                    exit();
                } else {

                function data($data)
                {
                    $f = explode("-", $data); //Gera um array com 0 = ano, 1 = mês, 2 = dia
                    $g = $f[2] . "/" . $f[1] . "/" . $f[0]; //Isso é uma string. Formate-a como quiser
                    return $g;
                }


                if ($_SESSION['adm'] > 0) {

                    $sql = "SELECT t.pkIdTare,t.tituloTare,t.descricaoTare,t.dataTare,t.concluida, U.nomeUsu 
                    FROM tbTarefa T 
                    INNER JOIN tbUsuario U 
                    ON T.fkIdUsu = U.pkIdUsu 
                    ORDER BY t.pkIdTare , t.concluida;";
                $res = $conn->query($sql) or die($conn->error);

                    echo "<tr>";
                    echo "<th>Id</th>";
                    echo "<th>Criador</th>";
                    echo "<th>Titulo</th>";
                    echo "<th>Descrição</th>";
                    echo "<th>Data</th>";
                    echo "<th>Concluida</th>";
                    echo "<th colspan='2'>Alterar</tr>";
                    echo "<tr>";

                    while ($row = mysqli_fetch_assoc($res)) {


                        echo "<td>" . $row['pkIdTare'] . "</td>";
                        echo "<td>" . $row['nomeUsu'] . "</td>";
                        echo "<td>" . $row['tituloTare'] . "</td>";
                        echo "<td>" . $row['descricaoTare'] . "</td>";
                        echo "<td style='width:10em'>" . data($row['dataTare']) . "</td>";
                        echo "<td>" . $row['concluida'] . "</td>";
                        echo "<td style='width:6'><a href='pageEditarTare.php?id=" . $row['pkIdTare'] . "'>Editar</a></td>";
                        echo "<td style='width:6'><a href='pageExcluirTare.php?id=" . $row['pkIdTare'] . "'>Excluir</a></td>";
                        echo "</tr>";
                    }
                } else {

                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM tbTarefa WHERE fkIdUsu='$id' ORDER BY pkIdTare";
                    $res = $conn->query($sql) or die($conn->error);

                    echo "<tr>";
                    echo "<th>Titulo</th>";
                    echo "<th>Descrição</th>";
                    echo "<th>Data</th>";
                    echo "<th>Concluida</th>";
                    echo "<th>Alterar</tr>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($res)) {


                        echo "<tr>";
                        echo "<td>" . $row['tituloTare'] . "</td>";
                        echo "<td>" . $row['descricaoTare'] . "</td>";
                        echo "<td style='width:10em'>" .  data($row['dataTare']) . "</td>";
                        echo "<td>" . $row['concluida'] . "</td>";
                        echo "<td><a href='pageEditarTare.php?id=" . $row['pkIdTare'] . ">Editar</a> | <a 'href='pageExcluirTare.php?id=" . $row['pkIdTare'] . "'>Excluir</a></td>";
                        echo "</tr>";
                    }
                }
            }
                ?>
            </table>
        </div>
    </div>
</body>

</html>