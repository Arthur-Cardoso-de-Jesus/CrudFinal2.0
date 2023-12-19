<?php
session_start();

include("config.php");
$email =  mysqli_real_escape_string($conn, $_POST['email']);
$senha =  mysqli_real_escape_string($conn, $_POST['senha']);
$senha_md5 = md5($senha); // Criptografa a senha usando MD5
$sql = "select * from tbUsuario where
    emailUsu = '$email' and senhaUsu = '$senha_md5'";
$res = $conn->query($sql) or die($conn->error);
$row = $res->fetch_object();
$qtd = $res->num_rows;

if ($qtd > 0) {
    $_SESSION["id"] = $row->pkIdUsu ;
    $_SESSION["email"] = $email;
    $_SESSION["nome"] = $row->nomeUsu;
    $_SESSION["adm"] = $row->adm;

    echo "<script> alert('Show de bola!'); </script>";
    header("refresh:0; url=index.php");
} else {
    echo "<script> alert('Login incorreto!'); </script>";
        header("refresh:0; url=pageLogin.php");
}
