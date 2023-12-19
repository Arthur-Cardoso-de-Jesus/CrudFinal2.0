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
	$nome = $_POST["nome"];
	$email = $_POST['email'];
	$adm = $_POST['adm'];
	$senha =  mysqli_real_escape_string($conn, $_POST['senha']);
	$senhaConfirm = mysqli_real_escape_string($conn, $_POST['senhaConfirm']);

	if (isset($senha)) {
		if ($senha === $senhaConfirm) {
			$sql = "UPDATE tbUsuario SET nomeUsu='$nome', emailUsu='$email', adm='$adm' WHERE pkIdUsu='$id'";

			if (mysqli_query($conn, $sql)) {
				echo "Usuário atualizado com sucesso.";

				if ($id == $_SESSION['id']) {
					$_SESSION["id"] = $row->pkIdUsu;
					$_SESSION["email"] = $email;
					$_SESSION["nome"] = $row->nomeUsu;
					$_SESSION["adm"] = $row->adm;
				}
			} else {
				echo "Erro ao atualizar usuário: " . mysqli_error($conn);
			}
		} else {
			echo "Senhas não correspondem!";
		}
	} else {
		$sql = "UPDATE tbUsuario SET nomeUsu='$nome', emailUsu='$email', adm='$adm' WHERE pkIdUsu='$id'";

		if (mysqli_query($conn, $sql)) {
			echo "Usuário atualizado com sucesso.";

			if ($id == $_SESSION['id']) {
				$_SESSION["id"] = $row->pkIdUsu;
				$_SESSION["email"] = $email;
				$_SESSION["nome"] = $row->nomeUsu;
				$_SESSION["adm"] = $row->adm;
			}
		} else {
			echo "Erro ao atualizar usuário: " . mysqli_error($conn);
		}
	}

	// redirecionar de volta para o perfil do usuário
	header("Location: pageUsuarios.php");
	exit();
} else {
	// exibir o formulário preenchido com os dados do usuário
	$id = $_GET["id"];
	$sql = "SELECT * FROM tbUsuario WHERE pkIdUsu=$id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$nome = $row['nomeUsu'];
	$email = $row['emailUsu'];
	$adm = $row['adm'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/pageEditarUsu.css">
	<title>Editar usuário</title>
</head>

<body>
	<div id="header">
		<div id="menu">
			<input class="botoes" id="Menu" type="button" onclick="location.href='index.php'" value="Menu">
			<input class="botoes" id="logout" type="button" onclick="location.href='logout.php'" value="Deslogar">
		</div>
	</div>

	<div id="conteudo">

		<form id="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<h1 id="titulo-formulario">Editar usuário:</h1>

			<input id="id" type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

			<input class="input" placeholder="Nome:" type="text" name="nome" value="<?php echo $nome; ?>">
			<input class="input" placeholder="Email:" type="email" name="email" value="<?php echo $email; ?>">
			<input class="input" id="senha" name="senha" type="password" placeholder="Senha">
			<input class="input" id="senhaConfirm" name="senhaConfirm" type="password" placeholder="Confirmar senha">
			<h4>ADM:</h4>
			<div id="divRadio">
				<div id='rdEsquerda'>
					<input id='concluidaSim' class='radio' type='radio' name='adm' value='1' checked>
					<label for='huey'>Sim</label>
				</div>
				<div id='rdDireita'>
					<input id='concluidaNao' class='radio' type='radio' name='adm' value='0'>
					<label for='completoNao'>Não</label>
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