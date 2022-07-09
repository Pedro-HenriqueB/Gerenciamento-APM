<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estilo.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  margin: 0% 37%;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
	<div class="loader"></div>

	<?php 
	require_once("BD/connectarBD.php");
	echo '<br><br>';

			if(isset($_POST['nome']) || isset($_POST['numero']) || isset($_POST['situacao'])){

			if($_POST['nome'] == null){
				$nome = 'SemNome';
			} else {
				$nome = $_POST['nome'];
			}
			
			$numero = $_POST['numero'];
			$situacao = $_POST['situacao'];

			$sql = "UPDATE armarios SET nome = :nome WHERE numero = :numero";
			$stmt = $connectar->prepare($sql);
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':numero', $numero);
			$stmt->execute();

			$sql = "UPDATE armarios SET situacao = :situacao WHERE numero = :numero";
			$stmt = $connectar->prepare($sql);
			$stmt->bindParam(':situacao', $situacao);
			$stmt->bindParam(':numero', $numero);
			$stmt->execute();
				
	}

	$url = "http://127.0.0.1/gerenciamentoapm/armarios/visualizar.php";
	echo '<META HTTP-EQUIV=REFRESH CONTENT ="1;' .$url. '">';



?>

</body>
</html>