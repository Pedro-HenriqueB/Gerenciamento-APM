<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloContribuintesAPM.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
	<style type="text/css">
		body{
			padding: 0 15%;
		}
		
		.rodape{
			padding: 0 30%;
		}
	</style>
</head>
<body>
	<div class="titulo"><h1>Clausulas</h1></div>
	<?php
	require_once("BD/connectarBD.php");
	setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");

	$sql = "SELECT clausula FROM clausulas";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$clausulas = $stmt->fetchAll();

	if($clausulas[0][0] === null)
	{
		$sql = "INSERT INTO clausulas VALUES ('Não há clausulas salvas!')";
		$stmt =  $connectar->query($sql);
		echo 'Texto nao ha clausulas salvo!';
	}

	 ; ?>
	 <!--///////////////////////////////////////////Clausulas////////////////////////////////////////////////////////////////-->




<?php
?>
<form method="post" action="updateClausulas.php">
	<br>
	<label for="numero"><?php echo 'clausulas: ' ?></label>
	<br>
	<textarea id="clausulas" name="clausulas" rows="30" cols="130">
		<?php if(isset($clausulas[0][0])) echo $clausulas[0][0]; ?>
	</textarea>
	<input type="submit" name="Enviar">
</form>
<?php



/*
$i = 0;
while($i < $clausulaCount)
{
	 if(isset($numeros[0][$i]))
	{
		echo $numeros[0][$i];
	}
}

 */

?>
<a href="contribuintesAPM.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>

</body>
</html>
