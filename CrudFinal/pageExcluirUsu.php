<?php
// verificar se o usuário está logado
session_start();

if (!isset($_SESSION["id"])) {
	header("Location: pageLogin.php");
	exit();
}

// conectar-se ao banco de dados
include("config.php");

// verificar se o usuário confirmou a exclusão
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// excluir o usuário do banco de dados
	$id = $_POST["id"];
	$sql = "DELETE FROM tbUsuario WHERE pkIdUsu=$id";
	if (mysqli_query($conn, $sql)) {

		echo "<script> alert('Usuário excluído com sucesso.'); </script>";
		echo "<script> location.href='pageUsuarios.php'; </script>";

		echo "Erro ao excluir usuário: " . mysqli_error($conn);
		exit();
	} else {
		echo "<script> alert('Exclusão cancelada.'); </script>";
	}
}

// exibir a mensagem de confirmação
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css\pageExcluirUsu.css">
	<title>Excluir</title>
</head>

<body>

	<div id="header">
		<div id="menu">
			<input class="botoes" id="Menu" type="button" onclick="location.href='index.php'" value="Menu">
			<input class="botoes" id="logout" type="button" onclick="location.href='logout.php'" value="Sair">
		</div>
	</div>


	<div id="conteudo">

		<form id="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<h1>Excluir usuário</h1>
			<p>Tem certeza que deseja excluir esse usuário do programa?</p>
			<input id="id" type="hidden" name="id" value="<?php echo $_GET['id']  ?>">

			<input class="botoes" id="btn-excluir" type="submit" name="submit" value="Excluir">
			<input class="botoes" sid="Menu" type="button" onclick="location.href='pageUsuarios.php'" Value="Cancelar">
		</form>

	</div>
</body>

</html>