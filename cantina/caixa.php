<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloCantina.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<div class="titulo"><h1>Caixa</h1></div>
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

			$sql = "SELECT tipoPagamento FROM registroCantina WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroCantina WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroCantina WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroCantina WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroCantina WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroCantina WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

			$sql = "SELECT data FROM registroCantina WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$datasCantina = $stmt->fetchAll();
			break;

		default:
			// code...
			break;
	}

	?>
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
			<?php foreach($tipoPagamentos as $tipoPagamento){ ?>
				<td> <?php echo $tipoPagamento[0];?> </td>
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


<?php } //fechando o if($_POST == null)?>
<a href="cantina.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>
</body>
</html>