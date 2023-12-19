<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pageUsuarios.css">
    <title>Login</title>
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

            <h1>Usuários:</h1>
            <input id="btnAdicionar" type="button" onclick="location.href='pageCadastroLogado.php'" value="Adicionar usuário!">

            <table>

                <?php
                session_start();

                if (!isset($_SESSION["id"])) {
                    header("Location: pageLogin.php");
                    exit();
                } else {

                    include("config.php");

                    if ($_SESSION['adm'] > 0) {
                        $sql = "SELECT * FROM tbUsuario ORDER BY pkIdUsu";
                        $res = $conn->query($sql) or die($conn->error);

                        echo "<tr>";
                        echo "<th>Id</th>";
                        echo "<th>Nome</th>";
                        echo "<th>Email</th>";
                        echo "<th>ADM</th>";
                        echo "<th colspan='2'>Config</th>";
                        echo "</tr>";

                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['pkIdUsu'];

                            echo "<tr>";
                            echo "<td>" . $row['pkIdUsu'] . "</td>";
                            echo "<td>" . $row['nomeUsu'] . "</td>";
                            echo "<td>" . $row['emailUsu'] . "</td>";
                            echo "<td>" . $row['adm'] . "</td>";
                            echo "<td style='width:6'><a href='pageEditarUsu.php?id=" . $row['pkIdUsu'] . "'>Editar</a></td>";
                            echo "<td style='width:6'><a href='pageExcluirUsu.php?id=" . $row['pkIdUsu'] . "'>Excluir</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        $sql = "SELECT * FROM tbUsuario ORDER BY pkIdUsu";
                        $res = $conn->query($sql) or die($conn->error);

                        echo "<tr>";
                        echo "<th>Id</th>";
                        echo "<th>Nome</th>";
                        echo "<th>Email</th>";

                        echo "</tr>";

                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['pkIdUsu'];

                            echo "<tr>";
                            echo "<td>" . $row['pkIdUsu'] . "</td>";
                            echo "<td>" . $row['nomeUsu'] . "</td>";
                            echo "<td>" . $row['emailUsu'] . "</td>";
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