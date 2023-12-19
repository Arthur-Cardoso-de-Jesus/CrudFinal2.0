<?php
// verificar se o usuário está logado
session_start();

if (!isset($_SESSION["id"])) {
	header("Location: pageLogin.php");
	exit();
}

// conectar-se ao banco de dados
include("config.php");

// verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// atualizar os dados do usuário no banco de dados
	$id = $_POST["id"];
	$titulo = $_POST["tituloTare"];
	$descricao = $_POST['descricaoTare'];
	$data = $_POST['dataTare'];
	$concluida = $_POST['concluida'];

	$sql = "UPDATE tbTarefa SET tituloTare='$titulo', descricaoTare='$descricao', concluida='$concluida', dataTare='$data' WHERE pkIdTare='$id'";


	if (mysqli_query($conn, $sql)) {
		echo "Tarefa atualizada com sucesso.";
	} else {
		echo "Erro ao atualizar usuário: " . mysqli_error($conn);
	}

	// redirecionar de volta para o perfil do usuário
	header("Location: pageTarefas.php");
	exit();
} else {
	// exibir o formulário preenchido com os dados do usuário
	$id = $_GET["id"];
	$sql = "SELECT * FROM tbTarefa WHERE pkIdTare=$id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$titulo = $row['tituloTare'];
	$descricao = $row['descricaoTare'];
	$data = $row['dataTare'];
	$concluida = $row['concluida'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/pageEditaTare.css">
	<title>Editar usuário</title>
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
			<h1 id="titulo-formulario">Editar usuário:</h1>
			<input id="id" type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
			<input class="input" placeholder="Titulo:" type="text" name="tituloTare" value="<?php echo $titulo; ?>">
			<input class="input" placeholder="Descrição:" type="type" name="descricaoTare" value="<?php echo $descricao; ?>">
			<input class="input" placeholder="Data:" type="date" name="dataTare" value="<?php echo $data; ?>">
			<div id="divRadio">
				<div id="rdEsquerda">
					<input id="concluidaSim" class="radio" type="radio" name="concluida" value="Sim">
					<label for="huey">Sim</label>
				</div>
				<div id="rdDireita">
					<input id="concluidaNao" class="radio" type="radio" name="concluida" value="Não" checked>
					<label for="completoNao">Não</label>
					<br>
				</div>
			</div>
			<div id="botoes">
				<input class="botoesForm" id="btn-editar" type="submit" name="submit" value="Editar">
				<input class="botoesForm" sid="Menu" type="button" onclick="location.href='pageTarefas.php'" Value="Menu">
			</div>
		</form>
	</div>
</body>

</html>