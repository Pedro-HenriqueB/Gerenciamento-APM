<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gerencimento APM</title>
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

if(isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['precoMAX']) && isset($_POST['valor']) && isset($_POST['precoMIN']) && isset($_POST['quantidade'])){

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$precoMAX = $_POST['precoMAX'];
	$valor = $_POST['valor'];
	$precoMIN = $_POST['precoMIN'];
	$quantidade = $_POST['quantidade'];

	$sql = "UPDATE uniformes SET nome = :nome WHERE id = :id";
	$stmt = $connectar->prepare($sql);
	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	$sql = "UPDATE uniformes SET precoMAX = :precoMAX WHERE id = :id";
	$stmt = $connectar->prepare($sql);
	$stmt->bindParam(':precoMAX', $precoMAX);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	$sql = "UPDATE uniformes SET valor = :valor WHERE id = :id";
	$stmt = $connectar->prepare($sql);
	$stmt->bindParam(':valor', $valor);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	$sql = "UPDATE uniformes SET precoMIN = :precoMIN WHERE id = :id";
	$stmt = $connectar->prepare($sql);
	$stmt->bindParam(':precoMIN', $precoMIN);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	$sql = "UPDATE uniformes SET quantidade = :quantidade WHERE id = :id";
	$stmt = $connectar->prepare($sql);
	$stmt->bindParam(':quantidade', $quantidade);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

}


$url = "http://127.0.0.1/gerenciamentoapm/gestaoProdutos/infoItens.php";
echo '<META HTTP-EQUIV=REFRESH CONTENT ="1;' .$url. '">';

 ?>

 </body>
</html>