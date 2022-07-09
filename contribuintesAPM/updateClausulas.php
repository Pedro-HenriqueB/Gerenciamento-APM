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

	

	 ; ?>
	 <!--///////////////////////////////////////////Clausulas////////////////////////////////////////////////////////////////-->



<br>
<?php
if(isset($_POST['clausulas']))
{

	$clausula = $_POST['clausulas'];

	$sql = "UPDATE clausulas SET clausula = :clausulas";
	$stmt = $connectar->prepare($sql);
	$stmt->bindParam(':clausulas', $clausula);
	$stmt->execute();

	echo 'Clasula(s) Alterada(s)!';
}

//var_dump($clausulas);
?>
<a href="clausulas.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>

</body>
</html>
