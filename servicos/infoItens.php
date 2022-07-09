
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloServicos.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>


<?php
require_once("BD/connectarBD.php");

$sql = "SELECT nome FROM servicosfornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomes = $stmt->fetchAll();

$sql = "SELECT servico FROM servicosfornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$servicos = $stmt->fetchAll();

$sql = "SELECT precoMIN FROM servicosfornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMINS = $stmt->fetchAll();

$sql = "SELECT precoMAX FROM servicosfornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMAXS = $stmt->fetchAll();

$sql = "SELECT valor FROM servicosfornecedores";
$stmt = $connectar->prepare($sql);
$stmt->execute();
$valores = $stmt->fetchAll();

?>


<table border="1px">
	<tr>
		<?php foreach($nomes as $nome){ ?>
		<th><?php echo $nome[0];?></th>
		<?php 
		}
		?>
	</tr>
		<tr>
		<?php foreach($servicos as $servico){ ?>
		<td><?php echo 'Produto: ' . $servico[0]; ?></td>
		<?php 
		}
		?>
	</tr>
		<tr>
		<?php foreach($precoMINS as $precoMIN){ ?>
		<td><?php echo 'Preço Mínimo: ' . $precoMIN[0]; ?></td>
		<?php 
		}
		?>
	</tr>
	<tr>
		<?php foreach($precoMAXS as $precoMAX){ ?>
		<td><?php echo 'Preço Máximo: ' . $precoMAX[0]; ?></td>
		<?php 
		}
		?>
	</tr>
	<tr>
		<?php foreach($valores as $valorCompra){ ?>
		<td><?php echo 'Valor de Compra: ' . $valorCompra[0]; ?></td>
		<?php 
		}
		?>
	</tr>
</table>

</body>
</html>