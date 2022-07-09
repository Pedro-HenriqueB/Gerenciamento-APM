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
<div class="bg">
<form method="post" action="balanco.php">
	<div class="nomes"><label>Definir Porcentagem do Lucro:</label></div>
	<div class="inputs"><input type="float" name="lucro"></div>
	<input type="submit" name="enviar" value="Enviar">
</form>
</div>
<div class="tabela">
<?php 

$total = 0;

foreach($eventos as $evento){

$sql = "SELECT nome FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomes = $stmt->fetchAll();

$sql = "SELECT quantidade FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$quantidades = $stmt->fetchAll();

$sql = "SELECT valorVenda FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorVendas = $stmt->fetchAll();

$sql = "SELECT valorCompra FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorCompras = $stmt->fetchAll();

$sql = "SELECT data FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$datas = $stmt->fetchAll();

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
	<?php
	$total += $resultado;
	} 
	echo "Total: $total";
	?>
</div>
<a href="eventos.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>
</body>
</html>