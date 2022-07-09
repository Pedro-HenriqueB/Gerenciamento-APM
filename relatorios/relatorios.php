<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloRelatorios.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<div class="titulo"><h1>Relatórios</h1></div>
<div class="bg">
<form method="post">
	<select id="periodo" name="periodo">
		<label for="periodo">Selecione o periodo</label>
		<option value="1">Manhã</option>
		<option value="2">Tarde</option>
		<option value="3">Noite</option>
		<option value="4">Dia atual</option>
		<option value="5">Semana Atual</option>
		<option value="6">Mês Atual</option>
	</select>
	<input type="submit" name="enviar" value="Enviar">
</form>
</div>
<?php 
require_once("BD/connectarBD.php");
setlocale(LC_ALL, 'pt_BR');

//Uniformes
$sql = "SELECT nome FROM registroUniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomeUniformes = $stmt->fetchAll();

$sql = "SELECT quantidade FROM registroUniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$quantidadeUniformes = $stmt->fetchAll();

$sql = "SELECT valor FROM registroUniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorUniformes = $stmt->fetchAll();

$sql = "SELECT data FROM registroUniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$dataUniformes = $stmt->fetchAll();

//Cantina
$sql = "SELECT nome FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomesCantina = $stmt->fetchAll();

$sql = "SELECT quantidade FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$quantidadesCantina = $stmt->fetchAll();

$sql = "SELECT valorVenda FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorVendasCantina = $stmt->fetchAll();

$sql = "SELECT valorCompra FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorComprasCantina = $stmt->fetchAll();

$sql = "SELECT data FROM registroCantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$datasCantina = $stmt->fetchAll();

//Eventos
$sql = "SELECT DISTINCT evento FROM registroEventos";
$stmt = $connectar->query($sql);
$stmt->execute();
$eventos = $stmt->fetchAll();

foreach($eventos as $evento){

$sql = "SELECT nome FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomesEvento = $stmt->fetchAll();

$sql = "SELECT quantidade FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$quantidadesEvento = $stmt->fetchAll();

$sql = "SELECT valorVenda FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorVendasEvento = $stmt->fetchAll();

$sql = "SELECT valorCompra FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$valorComprasEvento = $stmt->fetchAll();

$sql = "SELECT data FROM registroEventos WHERE evento = '$evento[0]'";
$stmt = $connectar->query($sql);
$stmt->execute();
$datasEvento = $stmt->fetchAll();
}

if(isset($_POST['periodo'])){
	$manhaInicio = date("Y-m-d H:i:s", strtotime('06:00:00'));
	$manhaTermino = date("Y-m-d H:i:s", strtotime('12:00:00'));

	$tardeInicio = date("Y-m-d H:i:s", strtotime('12:00:00'));
	$tardeTermino = date("Y-m-d H:i:s", strtotime('18:00:00'));

	$noiteInicio = date("Y-m-d H:i:s", strtotime('18:00:00'));
	$noiteTermino = date("Y-m-d H:i:s", strtotime('23:59:59'));

	$diaInicio = date("Y-m-d H:i:s", strtotime('-1 day'));
	$diaTermino = date("Y-m-d H:i:s", strtotime('+1 day'));

	$semanaInicio = date("Y-m-d H:i:s", strtotime('-7 day'));
	$semanaTermino = date("Y-m-d H:i:s");

	$mesInicio = date("Y-m-d H:i:s", strtotime('-1 month'));
	$mesTermino = date("Y-m-d H:i:s", strtotime('+1 month'));

	//Uniformes Switch
	switch($_POST['periodo']) {

		case $_POST['periodo'] = '1':
			$sql = "SELECT nome FROM registroUniformes WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomeUniformes = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroUniformes WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadeUniformes = $stmt->fetchAll();

			$sql = "SELECT valor FROM registroUniformes WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorUniformes = $stmt->fetchAll();

			$sql = "SELECT data FROM registroUniformes WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$dataUniformes = $stmt->fetchAll();
			break;
			
			case $_POST['periodo'] = '2':
			$sql = "SELECT nome FROM registroUniformes WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomeUniformes = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroUniformes WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadeUniformes = $stmt->fetchAll();

			$sql = "SELECT valor FROM registroUniformes WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorUniformes = $stmt->fetchAll();

			$sql = "SELECT data FROM registroUniformes WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$dataUniformes = $stmt->fetchAll();
			break;

			case $_POST['periodo'] = '3':
			$sql = "SELECT nome FROM registroUniformes WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomeUniformes = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroUniformes WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadeUniformes = $stmt->fetchAll();

			$sql = "SELECT valor FROM registroUniformes WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorUniformes = $stmt->fetchAll();

			$sql = "SELECT data FROM registroUniformes WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$dataUniformes = $stmt->fetchAll();
			break;

			case $_POST['periodo'] = '4':
			$sql = "SELECT nome FROM registroUniformes WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomeUniformes = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroUniformes WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadeUniformes = $stmt->fetchAll();

			$sql = "SELECT valor FROM registroUniformes WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorUniformes = $stmt->fetchAll();

			$sql = "SELECT data FROM registroUniformes WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$dataUniformes = $stmt->fetchAll();
			break;

			case $_POST['periodo'] = '5':
			$sql = "SELECT nome FROM registroUniformes WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomeUniformes = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroUniformes WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadeUniformes = $stmt->fetchAll();

			$sql = "SELECT valor FROM registroUniformes WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorUniformes = $stmt->fetchAll();

			$sql = "SELECT data FROM registroUniformes WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$dataUniformes = $stmt->fetchAll();
			break;

			case $_POST['periodo'] = '6':
			$sql = "SELECT nome FROM registroUniformes WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomeUniformes = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroUniformes WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadeUniformes = $stmt->fetchAll();

			$sql = "SELECT valor FROM registroUniformes WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorUniformes = $stmt->fetchAll();

			$sql = "SELECT data FROM registroUniformes WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$dataUniformes = $stmt->fetchAll();
			break;

		default:
			// code...
			break;
	}
	//Cantina Switch
	switch($_POST['periodo']) {

		case $_POST['periodo'] = '1':
			$sql = "SELECT nome FROM registroCantina WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesCantina = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroCantina WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesCantina = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroCantina WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasCantina = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroCantina WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasCantina = $stmt->fetchAll();

			$sql = "SELECT data FROM registroCantina WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasCantina = $stmt->fetchAll();
			break;
			
			case $_POST['periodo'] = '2':
			$sql = "SELECT nome FROM registroCantina WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesCantina = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroCantina WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesCantina = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroCantina WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasCantina = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroCantina WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasCantina = $stmt->fetchAll();

			$sql = "SELECT data FROM registroCantina WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasCantina = $stmt->fetchAll();
			break;

			case $_POST['periodo'] = '3':
			$sql = "SELECT nome FROM registroCantina WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesCantina = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroCantina WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesCantina = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroCantina WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasCantina = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroCantina WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasCantina = $stmt->fetchAll();

			$sql = "SELECT data FROM registroCantina WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasCantina = $stmt->fetchAll();
			break;

			case $_POST['periodo'] = '4':
			$sql = "SELECT nome FROM registroCantina WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesCantina = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroCantina WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesCantina = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroCantina WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasCantina = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroCantina WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasCantina = $stmt->fetchAll();

			$sql = "SELECT data FROM registroCantina WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasCantina = $stmt->fetchAll();
			break;

			case $_POST['periodo'] = '5':
			$sql = "SELECT nome FROM registroCantina WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesCantina = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroCantina WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesCantina = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroCantina WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasCantina = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroCantina WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasCantina = $stmt->fetchAll();

			$sql = "SELECT data FROM registroCantina WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasCantina = $stmt->fetchAll();
			break;

			case $_POST['periodo'] = '6':
			$sql = "SELECT nome FROM registroCantina WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesCantina = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroCantina WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesCantina = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroCantina WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasCantina = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroCantina WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasCantina = $stmt->fetchAll();

			$sql = "SELECT data FROM registroCantina WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasCantina = $stmt->fetchAll();
			break;

		default:
			// code...
			break;
	}

	//Eventos Switch
	switch($_POST['periodo']) {

		case $_POST['periodo'] = '1':
			foreach($eventos as $evento){

			$sql = "SELECT nome FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesEvento = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesEvento = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasEvento = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasEvento = $stmt->fetchAll();

			$sql = "SELECT data FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasEvento = $stmt->fetchAll();

			?>
<div class="tabela">
<table border = "1px">
	<tr>
			<th> <?php echo $evento[0];?> </th>
	</tr>
	<tr>
			<?php foreach($nomesEvento as $nome){ ?>
				<td> <?php echo $nome[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadesEvento as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorComprasEvento as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendasEvento as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datasEvento as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorVendasEvento as $valor){
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
	<?php 
		}
			break;
			
			case $_POST['periodo'] = '2':
			foreach($eventos as $evento){

			$sql = "SELECT nome FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesEvento = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesEvento = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasEvento = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasEvento = $stmt->fetchAll();

			$sql = "SELECT data FROM registroEventos WHERE evento = '$evento[0]' AND
			 data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasEvento = $stmt->fetchAll();

			?>
<div class="tabela">
<table border = "1px">
	<tr>
			<th> <?php echo $evento[0];?> </th>
	</tr>
	<tr>
			<?php foreach($nomesEvento as $nome){ ?>
				<td> <?php echo $nome[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadesEvento as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorComprasEvento as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendasEvento as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datasEvento as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorVendasEvento as $valor){
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

	<?php 
		}
			break;

			case $_POST['periodo'] = '3':
			foreach($eventos as $evento){

			$sql = "SELECT nome FROM registroEventos WHERE evento = '$evento[0]' AND
			data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesEvento = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroEventos WHERE evento = '$evento[0]' AND
			data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesEvento = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroEventos WHERE evento = '$evento[0]' AND
			data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasEvento = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroEventos WHERE evento = '$evento[0]' AND
			data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasEvento = $stmt->fetchAll();

			$sql = "SELECT data FROM registroEventos WHERE evento = '$evento[0]' AND
			data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasEvento = $stmt->fetchAll();
			
			?>
<div class="tabela">
<table border = "1px">
	<tr>
			<th> <?php echo $evento[0];?> </th>
	</tr>
	<tr>
			<?php foreach($nomesEvento as $nome){ ?>
				<td> <?php echo $nome[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadesEvento as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorComprasEvento as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendasEvento as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datasEvento as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorVendasEvento as $valor){
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
	<?php 
		}
			break;

			case $_POST['periodo'] = '4':
			foreach($eventos as $evento){

			$sql = "SELECT nome FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesEvento = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesEvento = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasEvento = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasEvento = $stmt->fetchAll();

			$sql = "SELECT data FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasEvento = $stmt->fetchAll();
			
			?>
<div class="tabela">
<table border = "1px">
	<tr>
			<th> <?php echo $evento[0];?> </th>
	</tr>
	<tr>
			<?php foreach($nomesEvento as $nome){ ?>
				<td> <?php echo $nome[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadesEvento as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorComprasEvento as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendasEvento as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datasEvento as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorVendasEvento as $valor){
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
	<?php 
		}
			break;

			case $_POST['periodo'] = '5':
			foreach($eventos as $evento){

			$sql = "SELECT nome FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesEvento = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesEvento = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroEventos WHERE evento = '$evento[0]' AND 
			data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasEvento = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasEvento = $stmt->fetchAll();

			$sql = "SELECT data FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasEvento = $stmt->fetchAll();
			
			?>
<div class="tabela">
<table border = "1px">
	<tr>
			<th> <?php echo $evento[0];?> </th>
	</tr>
	<tr>
			<?php foreach($nomesEvento as $nome){ ?>
				<td> <?php echo $nome[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadesEvento as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorComprasEvento as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendasEvento as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datasEvento as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorVendasEvento as $valor){
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
	<?php 
		}
			break;

			case $_POST['periodo'] = '6':
			foreach($eventos as $evento){

			$sql = "SELECT nome FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomesEvento = $stmt->fetchAll();

			$sql = "SELECT quantidade FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$quantidadesEvento = $stmt->fetchAll();

			$sql = "SELECT valorVenda FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorVendasEvento = $stmt->fetchAll();

			$sql = "SELECT valorCompra FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$valorComprasEvento = $stmt->fetchAll();

			$sql = "SELECT data FROM registroEventos WHERE evento = '$evento[0]' AND
			data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasEvento = $stmt->fetchAll();
			
			?>
<div class="tabela">
<table border = "1px">
	<tr>
			<th> <?php echo $evento[0];?> </th>
	</tr>
	<tr>
			<?php foreach($nomesEvento as $nome){ ?>
				<td> <?php echo $nome[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadesEvento as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorComprasEvento as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendasEvento as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datasEvento as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>

<?php 

	$resultado = 0;
	foreach($valorVendasEvento as $valor){
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
	<?php 
		}
			break;
			
		default:
			// code...
			break;
	}
};


echo '<br><br>';
//foreach($datas as $quantidade){
	//echo $quantidade[0] . '<br>';
//}
?>



<?php //Tabela Eventos
if($_POST == null){
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
 <div class="tabela">
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
</table>
</div>
	<?php
		} 
	}

	?>
</div>



<?php //Tabela Uniforme ?>
<div class="tabela">
<table border = "1px">
	<tr>
			<?php foreach($nomeUniformes as $nome){ ?>
				<th> <?php echo $nome[0];?> </th>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadeUniformes as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorUniformes as $valor){ ?>
				<td> <?php if($valor[0] > 0){ 
					echo 'Venda:' . $valor[0]; 
				} else {
					echo 'Compra:' . $valor[0];
				}

				?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($dataUniformes as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorUniformes as $valor){
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
<?php //Tabela Cantina ?>
<div class="tabela">
<table border = "1px">
	<tr>
			<?php foreach($nomesCantina as $nome){ ?>
				<th> <?php echo $nome[0];?> </th>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadesCantina as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorComprasCantina as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendasCantina as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datasCantina as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorVendasCantina as $valor){
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

<?php 
if(isset($_POST['periodo'])){
	switch($_POST['periodo']){
		case $_POST['periodo'] = 1:
	$sql = "SELECT nome FROM contribuintes WHERE periodo = 'manhã'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT id FROM contribuintes WHERE periodo = 'manhã'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$ids = $stmt->fetchAll();

	$sql = "SELECT valor FROM contribuintes WHERE periodo = 'manhã'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valores = $stmt->fetchAll();

	$sql = "SELECT periodo FROM contribuintes WHERE periodo = 'manhã'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$periodos = $stmt->fetchAll();

	?>
	<div class="tabela">
	<table>
		<tr>
			<?php foreach($nomes as $nome){ ?>
				<th><?php echo $nome[0]; } ?></th>
		</tr>
		<tr>
			<?php foreach($ids as $id){ ?>
				<td><?php echo $id[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($valores as $valor){ ?>
				<td><?php echo $valor[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($periodos as $periodo){ ?>
				<td>
					<?php echo $periodo[0]; } ?>
				</td>
		</tr>
	</table>
	</div>
	<?php
	break;

	case $_POST['periodo'] = 2:
	$sql = "SELECT nome FROM contribuintes WHERE periodo = 'tarde'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT id FROM contribuintes WHERE periodo = 'tarde'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$ids = $stmt->fetchAll();

	$sql = "SELECT valor FROM contribuintes WHERE periodo = 'tarde'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valores = $stmt->fetchAll();

	$sql = "SELECT periodo FROM contribuintes WHERE periodo = 'tarde'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$periodos = $stmt->fetchAll();

	?>
	<div class="tabela">
	<table>
		<tr>
			<?php foreach($nomes as $nome){ ?>
				<th><?php echo $nome[0]; } ?></th>
		</tr>
		<tr>
			<?php foreach($ids as $id){ ?>
				<td><?php echo $id[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($valores as $valor){ ?>
				<td><?php echo $valor[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($periodos as $periodo){ ?>
				<td>
					<?php echo $periodo[0]; } ?>
				</td>
		</tr>
	</table>
	</div>
	<?php
	break;

	case $_POST['periodo'] = 3:
	$sql = "SELECT nome FROM contribuintes WHERE periodo = 'noite'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT id FROM contribuintes WHERE periodo = 'noite'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$ids = $stmt->fetchAll();

	$sql = "SELECT valor FROM contribuintes WHERE periodo = 'noite'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valores = $stmt->fetchAll();

	$sql = "SELECT periodo FROM contribuintes WHERE periodo = 'noite'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$periodos = $stmt->fetchAll();

	?>
	<div class="tabela">
	<table>
		<tr>
			<?php foreach($nomes as $nome){ ?>
				<th><?php echo $nome[0]; } ?></th>
		</tr>
		<tr>
			<?php foreach($ids as $id){ ?>
				<td><?php echo $id[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($valores as $valor){ ?>
				<td><?php echo $valor[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($periodos as $periodo){ ?>
				<td>
					<?php echo $periodo[0]; } ?>
				</td>
		</tr>
	</table>
	</div>
	<?php
	break;

	default:
	$sql = "SELECT nome FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT id FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$ids = $stmt->fetchAll();

	$sql = "SELECT valor FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valores = $stmt->fetchAll();

	$sql = "SELECT periodo FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$periodos = $stmt->fetchAll();

	?>
	<div class="tabela">
	<table>
		<tr>
			<?php foreach($nomes as $nome){ ?>
				<th><?php echo $nome[0]; } ?></th>
		</tr>
		<tr>
			<?php foreach($ids as $id){ ?>
				<td><?php echo $id[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($valores as $valor){ ?>
				<td><?php echo $valor[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($periodos as $periodo){ ?>
				<td>
					<?php echo $periodo[0]; } ?>
				</td>
		</tr>
	</table>
	</div>
	<?php
	break;

	}
}
 ?>

<?php //Tabela Contribuintes
if($_POST == null){
	require_once("BD/connectarBD.php");
	$sql = "SELECT nome FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT id FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$ids = $stmt->fetchAll();

	$sql = "SELECT valor FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valores = $stmt->fetchAll();

	$sql = "SELECT periodo FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$periodos = $stmt->fetchAll();

	?>
	<div class="tabela">
	<table>
		<tr>
			<?php foreach($nomes as $nome){ ?>
				<th><?php echo $nome[0]; } ?></th>
		</tr>
		<tr>
			<?php foreach($ids as $id){ ?>
				<td><?php echo $id[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($valores as $valor){ ?>
				<td><?php echo $valor[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($periodos as $periodo){ ?>
				<td>
					<?php echo $periodo[0]; } ?>
				</td>
		</tr>
	</table>
	</div>

	<br><br>

	
<?php } //fechando o if($_POST == null)?>
<div class="titulo"><h1> Período</h1></div>
<form method="post">
	<label>Data de Inicio:</label>
	<input type="date" name="inicio">
	<label>Data Final</label>
	<input type="date" name="final">
	<input type="submit" name="enviar" value="Enviar">
</form>

<?php 
// Selecionar por periodo
if(isset($_POST['inicio']) && isset($_POST['final']))
{
	$inicio = $_POST['inicio'];
	$final = $_POST['final'];

	//Registro Uniformes
	$sql = "SELECT nome FROM registroUniformes WHERE data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomeUniformes = $stmt->fetchAll();

	$sql = "SELECT quantidade FROM registroUniformes WHERE data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$quantidadeUniformes = $stmt->fetchAll();

	$sql = "SELECT valor FROM registroUniformes WHERE data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valorUniformes = $stmt->fetchAll();

	$sql = "SELECT data FROM registroUniformes WHERE data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$dataUniformes = $stmt->fetchAll();

	$sql = "SELECT nome FROM registroCantina WHERE data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomesCantina = $stmt->fetchAll();

	//Tabela Uniforme ?>
<div class="tabela">
<table border = "1px">
	<tr>
			<?php foreach($nomeUniformes as $nome){ ?>
				<th> <?php echo $nome[0];?> </th>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadeUniformes as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorUniformes as $valor){ ?>
				<td> <?php if($valor[0] > 0){ 
					echo 'Venda:' . $valor[0]; 
				} else {
					echo 'Compra:' . $valor[0];
				}

				?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($dataUniformes as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorUniformes as $valor){
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

<?php
	//Registro Cantina
	$sql = "SELECT quantidade FROM registroCantina WHERE data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$quantidadesCantina = $stmt->fetchAll();

	$sql = "SELECT valorVenda FROM registroCantina WHERE data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valorVendasCantina = $stmt->fetchAll();

	$sql = "SELECT valorCompra FROM registroCantina WHERE data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valorComprasCantina = $stmt->fetchAll();

	$sql = "SELECT data FROM registroCantina WHERE data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$datasCantina = $stmt->fetchAll();

	//Tabela Cantina ?>
<div class="tabela">
<table border = "1px">
	<tr>
			<?php foreach($nomesCantina as $nome){ ?>
				<th> <?php echo $nome[0];?> </th>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadesCantina as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorComprasCantina as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendasCantina as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datasCantina as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<?php 

	$resultado = 0;
	foreach($valorVendasCantina as $valor){
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

<?php

	//Registro Eventos
	foreach($eventos as $evento){
	$sql = "SELECT nome FROM registroEventos WHERE evento = '$evento[0]' AND
	 data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomesEvento = $stmt->fetchAll();

	$sql = "SELECT quantidade FROM registroEventos WHERE evento = '$evento[0]' AND
	 data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$quantidadesEvento = $stmt->fetchAll();

	$sql = "SELECT valorVenda FROM registroEventos WHERE evento = '$evento[0]' AND
	data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valorVendasEvento = $stmt->fetchAll();

	$sql = "SELECT valorCompra FROM registroEventos WHERE evento = '$evento[0]' AND
	 data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valorComprasEvento = $stmt->fetchAll();

	$sql = "SELECT data FROM registroEventos WHERE evento = '$evento[0]' AND
	 data >= '$inicio' AND data <= '$final'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$datasEvento = $stmt->fetchAll();

	?>
<div class="tabela">
<table border = "1px">
	<tr>
			<th> <?php echo $evento[0];?> </th>
	</tr>
	<tr>
			<?php foreach($nomesEvento as $nome){ ?>
				<td> <?php echo $nome[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($quantidadesEvento as $quantidade){ ?>
				<td> <?php echo $quantidade[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorComprasEvento as $valorCompra){ ?>
				<td> <?php if(isset($valorCompra[0])) echo 'Compra:' . $valorCompra[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($valorVendasEvento as $valorVenda){ ?>
				<td> <?php if(isset($valorVenda[0])) echo 'Venda:' . $valorVenda[0]; ?> </td>
			<?php
			 } 
			 ?>
	</tr>
	<tr>
			<?php foreach($datasEvento as $data){ ?>
				<td> <?php echo $data[0];?> </td>
			<?php
			 } 
			 ?>
	</tr>

<?php 

	$resultado = 0;
	foreach($valorVendasEvento as $valor){
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
	<?php 
		}
	}
?>

<a href="../index.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>
</body>
</html>