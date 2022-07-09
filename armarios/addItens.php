<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloArmarios.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<div class="bg">
	<form method="post">
		<div class="nomes"><label for="nome">Nome:</label></div>
		<div class="inputs"><input type="text" id="nome" name="nome"></div>	
		<div class="nomes"><label for="numero">Número:</label></div>
		<div class="nomes"><input type="number" id="numero" name="numero"></div><br>
		<input type="submit" value="Alugar">
	</form>
	</div>

	<?php 
	session_start();
	require_once("BD/connectarBD.php");

	$sql = "SELECT nome FROM armarios";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT numero FROM armarios";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$numeros = $stmt->fetchAll();

	if(isset($_POST['nome']) && isset($_POST['numero'])){

		$nomePost = $_POST['nome'];
		$numeroPost = $_POST['numero'];

		if($nomes != null){
		foreach($nomes as $nome) {
			if($nome[0] == $nomePost){
				echo '<br>Nome já cadastrado!';
				$permissaoNome = false;
				break;
			} else {
				$permissaoNome = true;
			}
		}
	} else {
		$permissaoNome = true;
	}


		if($numeros != null){
		foreach($numeros as $numero){
			if($numero[0] == $numeroPost){
				echo '<br>Número já cadastra!';
				$permissaoNumero = false;
				break;
			} else {
				$permissaoNumero = true;
			}
		}
	} else {
		$permissaoNumero = true;
	}

		if($permissaoNome == true && $permissaoNumero == true){
		$sql = $connectar->prepare("INSERT INTO armarios VALUES(?, ?)");
		$sql->execute([$nomePost, $numeroPost]);
		echo '<br>Dados registrados!';
		session_destroy();
	} else {
		echo '<br>Insira os valores nos devidos campos! (Sem espaços!)';
	}
}


	?>

<a href="armarios.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>

</body>
</html>

