<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloEventos.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<div class="bg">
	<form method="post">
		<div class="nomes"><label>Nome do item a ser excluido:</label></div>
		<div class="inputs"><input type="text" id="nome" name="nome"></div>
		<input type="submit" name="excluir" value="Excluir">
	</form>
	</div>

	<br>

	<?php

	require_once("BD/connectarBD.php");
	session_start();
	if(isset($_POST['nome'])){
		$nome = $_POST['nome'];

		$sql = ("DELETE FROM eventos WHERE nome = :nome");

		$stmt = $connectar->prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->execute();
		echo '<br>Item excluido!';
		session_destroy();
	} else {
		echo '<br>Insira um valor válido no campo nome!';
	}

	?>

<a href="eventos.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>

</body>
</html>