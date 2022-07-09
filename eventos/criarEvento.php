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
	<label>Nome do Evento:</label>
	<input type="text" id="nomeEvento" name="nomeEvento">
	<input type="submit" name="criar" value="Criar">
</form>
</div>


<?php
require_once("BD/connectarBD.php");

if(isset($_POST['nomeEvento'])){
	$nomeEvento = $_POST['nomeEvento'];
	$sql = "CREATE TABLE IF NOT EXISTS $nomeEvento (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	precoMIN DECIMAL(6,2) NOT NULL,
	precoMAX DECIMAL(6,2) NOT NULL,
	valorVenda DECIMAL(6,2),
	valorCompra DECIMAL(6,2),
	quantidade INT
	)";

	$stmt = $connectar->query($sql);
	$resultado = $stmt;

	if($resultado){
		echo 'Evento Criado!';
	} else {
		echo 'Falha ao Criar Evento!';
	}
}

?>
<a href="eventos.php">
	<div class="opcoes">
			<h1>Voltar</h1>
	</div>
</a>

</body>
</html>