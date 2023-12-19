<?php
    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["email"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["adm"]);
    session_destroy();
    header("location: pageLogin.php");
?>