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
		<div class="nomes"><label for="evento">Evento:</label></div>
		<div class="inputs"><input type="text" id="evento" name="evento"></div>	
		<div class="nomes"><label for="nome">Nome:</label></div>
		<div class="inputs"><input type="text" id="nome" name="nome"></div>	
		<div class="nomes"><label for="precoMIN">Preço Minimo:</label></div>
		<div class="nomes"><input type="float" id="precoMIN" name="precoMIN"></div>
		<div class="nomes"><label for="precoMAX">Preço Máximo:</label></div>
		<div class="nomes"><input type="float" id="precoMAX" name="precoMAX"></div>
		<div class="nomes"><label for="valor">ValorVenda:</label></div>
		<div class="nomes"><input type="float" id="valorVenda" name="valorVenda"></div>
		<div class="nomes"><label for="valor">ValorCompra:</label></div>
		<div class="nomes"><input type="float" id="valorCompra" name="valorCompra"></div>
		<div class="nomes"><label for="valor">Quantidade:</label></div>
		<div class="nomes"><input type="number" id="quantidade" name="quantidade"></div><br>
		<input type="submit" value="Adicionar">
	</form>
	</div>

	<?php 
	session_start();
	require_once("BD/connectarBD.php");

	if(isset($_POST['evento']) && isset($_POST['nome']) && isset($_POST['precoMIN']) && isset($_POST['precoMAX']) &&
	 isset($_POST['valorVenda']) && isset($_POST['valorCompra']) && isset($_POST['quantidade'])) {

		$evento = $_POST['evento'];
		$nome = $_POST['nome'];
		$precoMIN = $_POST['precoMIN'];
		$precoMAX = $_POST['precoMAX'];
		$valorVenda = $_POST['valorVenda'];
		$valorCompra = $_POST['valorCompra'];
		$quantidade = $_POST['quantidade'];

		$sql = $connectar->prepare("INSERT INTO eventos VALUES(null, ?, ?, ?, ?, ?, ?, ?)");
		$sql->execute([$evento, $nome, $precoMIN, $precoMAX, $valorVenda, $valorCompra, $quantidade]);
		echo '<br>Dados registrados!';
		session_destroy();
	} else {
		echo '<br>Insira os valores nos devidos campos! (Sem espaços!)';
	}


	?>

<a href="eventos.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>

</body>
</html>

