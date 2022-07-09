<!<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloServicos.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<div class="bg">
	<form method="post">
		<div class="nomes"><label for="nome">Nome:</label></div>
		<div class="inputs"><input type="text" id="nome" name="nome"></div>

		<div class="nomes"><label for="servico">Serviço:</label></div>
		<div class="inputs"><input type="text" id="servico" name="servico"></div>

		<div class="nomes"><label for="valor">Valor:</label></div>
		<div class="nomes"><input type="float" id="valor" name="valor"></div>

		<br>
		<input type="submit" value="Adicionar">
	</form>
	</div>

	<?php 
	session_start();
	require_once("BD/connectarBD.php");

	if(isset($_POST['nome']) && isset($_POST['servico']) && isset($_POST['valor'])){

		$nome = $_POST['nome'];
		$servico = $_POST['servico'];
		$valor = $_POST['valor'];

		$sql = $connectar->prepare("INSERT INTO registroServicos VALUES(null, ?, ?, ?, null)");
		$sql->execute([$nome, $servico, $valor]);
		echo '<br>Dados registrados!';
		session_destroy();
	} else {
		echo '<br>Insira os valores nos devidos campos! (Sem espaços!)';
	}


	?>

<a href="servicos.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>

</body>
</html>

