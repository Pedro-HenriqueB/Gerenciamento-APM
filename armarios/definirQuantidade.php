<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloArmarios.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
	<style type="text/css">
</head>
<body>
<?php 
	require_once("BD/connectarBD.php");
	$sql = "SELECT nome FROM armarios";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT numero FROM armarios";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$numeros = $stmt->fetchAll();

	$sql = "SELECT situacao FROM armarios";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$situacoes = $stmt->fetchAll();

	session_start();
	echo '<br>';

	$quantidade = 20;

	$indice = 1;

	while($indice <= $quantidade)
	{
		$nome = 'SemNome';
		$numero = $indice;
		$situacao = 'Disponivel';
			$sql = ("INSERT INTO armarios VALUE(?, ?, ?)");
			$stmt = $connectar->prepare($sql);
			$stmt->execute([$nome, $numero, $situacao]);
			$indice++;
			echo "Armario numero $indice criado! <br>";
	}
?>
</body>
</html>
