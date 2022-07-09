<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estilo.css">
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

$sql = "SELECT tipoPagamento FROM registroUniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$tipoPagamentos = $stmt->fetchAll();

$sql = "SELECT data FROM registroUniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$dataUniformes = $stmt->fetchAll();


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

			$sql = "SELECT tipoPagamento FROM registroUniformes WHERE data >= '$manhaInicio' AND data <= '$manhaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroUniformes WHERE data >= '$tardeInicio' AND data <= '$tardeTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroUniformes WHERE data >= '$noiteInicio' AND data <= '$noiteTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroUniformes WHERE data > '$diaInicio' AND data < '$diaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroUniformes WHERE data > '$semanaInicio' AND data < '$semanaTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

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

			$sql = "SELECT tipoPagamento FROM registroUniformes WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$tipoPagamentos = $stmt->fetchAll();

			$sql = "SELECT data FROM registroUniformes WHERE data > '$mesInicio' AND data < '$mesTermino'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$dataUniformes = $stmt->fetchAll();
			break;

		default:
			// code...
			break;
	}
	
			?>

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
			<?php foreach($tipoPagamentos as $tipoPagamento){ ?>
				<td> <?php echo $tipoPagamento[0];?> </td>
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

<?php } //fechando o if($_POST == null)?>
<a href="uniformes.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>
</body>
</html>