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
	session_start();
	require_once("BD/connectarBD.php");

	if(isset($_POST['id'])){

		$id = $_POST['id'];
		$situacao = $_POST['situacao'];

		$sql = "UPDATE contribuintes SET situacao = :situacao WHERE id = :id";
		$stmt = $connectar->prepare($sql);
		$stmt->bindParam(':situacao', $situacao);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

	}


$url = "http://127.0.0.1/gerenciamentoapm/contribuintesAPM/contribuintesAPM.php";
echo '<META HTTP-EQUIV=REFRESH CONTENT ="1;' .$url. '">';
?>
</body>
</html>