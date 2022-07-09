<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloCantina.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php 
require_once("BD/connectarBD.php");
$sql = "SELECT nome FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomes = $stmt->fetchAll();

$sql = "SELECT quantidade FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$quantidades = $stmt->fetchAll();

$sql = "SELECT valorVenda FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorVendas = $stmt->fetchAll();

$sql = "SELECT valorCompra FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorCompras = $stmt->fetchAll();

$sql = "SELECT data FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$datas = $stmt->fetchAll();

echo '<br><br>';
//foreach($datas as $quantidade){
	//echo $quantidade[0] . '<br>';
//}
?>
<div class="bg">
<form method="post" action="balanco.php">
	<div class="nomes"><label>Definir Porcentagem do Lucro:</label></div>
	<div class="inputs"><input type="float" name="lucro"></div>
	<input type="submit" name="enviar" value="Enviar">
</form>
</div>
<div class="tabela">
<table border = "1px">
	<tr>
			<?php foreach($nomes as $nome){ ?>
				<th> <?php echo $nome[0];?> </th>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidades as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorCompras as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendas as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datas as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorVendas as $valor){
		$resultado += $valor[0];
	}

	?>

	<?php 
	$lucro = 0;
	if(isset($_POST['lucro'])){
		$lucro = $_POST['lucro'];
	}

	?>

	<tr>
		<th><?php echo "Saldo Total: $resultado"; ?></th>
		<th><?php echo 'Lucro: ' . $lucro *= $resultado; ?></th>
	</tr>
</table>
</div>
<a href="cantina.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>
</body>
</html>