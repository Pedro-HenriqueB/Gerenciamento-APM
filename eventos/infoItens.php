<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloEventos.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php 
require_once("BD/connectarBD.php");
$sql = "SELECT DISTINCT evento FROM registroEventos";
$stmt = $connectar->query($sql);
$stmt->execute();
$eventos = $stmt->fetchAll();

echo '<br>';
?>

<div class="tabela">
<?php 

$total = 0;

foreach($eventos as $evento){

$sql = "SELECT nome FROM eventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomes = $stmt->fetchAll();

$sql = "SELECT precoMIN FROM eventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMINS = $stmt->fetchAll();

$sql = "SELECT precoMAX FROM eventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMAXS = $stmt->fetchAll();

$sql = "SELECT valorVenda FROM eventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorVendas = $stmt->fetchAll();

$sql = "SELECT valorCompra FROM eventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorCompras = $stmt->fetchAll();

$sql = "SELECT quantidade FROM eventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$quantidades = $stmt->fetchAll();


 ?>
<table border = "1px">
	<tr>
			<th> <?php echo $evento[0];?> </th>
	</tr>
	<tr>
			<?php foreach($nomes as $nome){ ?>
				<td> <?php echo $nome[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($precoMINS as $precoMIN){ ?>
				<td> <?php echo 'Preço MIN.' . $precoMIN[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($precoMAXS as $precoMAX){ ?>
				<td> <?php echo 'Preço MAX.' . $precoMAX[0];?> </td>
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
			<?php foreach($valorCompras as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
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

</table>
<?php } ?>
</div>
<a href="eventos.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>
</body>
</html>