<!DOCTYPE html>
<html>
<head>
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

if(isset($_POST['nome']) && isset($_POST['valor'])){
	$nome = $_POST['nome'];
	$valor = $_POST['valor'];
	$item = $_POST['item']; 
	$sql = $connectar->prepare("INSERT INTO doacoes VALUES ( ?, ?, ?)");
	$sql->execute([$nome, $valor, $item]);
	echo 'Dados registrados!';
} else {
	echo 'Insira os valores nos devidoes campos!';
}



$url = "http://127.0.0.1/gerenciamentoapm/eventos/doacoes.php";
echo '<META HTTP-EQUIV=REFRESH CONTENT ="1;' .$url. '">';
?>


</body>
</html>
