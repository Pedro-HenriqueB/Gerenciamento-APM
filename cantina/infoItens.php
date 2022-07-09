
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloCantina.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>


<?php
require_once("BD/connectarBD.php");

$sql = "SELECT nome FROM cantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomes = $stmt->fetchAll();

$sql = "SELECT precoMAX FROM cantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMAXS = $stmt->fetchAll();

$sql = "SELECT valorVenda FROM cantina";
$stmt = $connectar->prepare($sql);
$stmt->execute();
$valorVendas = $stmt->fetchAll();

$sql = "SELECT valorCompra FROM cantina";
$stmt = $connectar->prepare($sql);
$stmt->execute();
$valorCompras = $stmt->fetchAll();

$sql = "SELECT precoMIN FROM cantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMINS = $stmt->fetchAll();

$sql = "SELECT quantidade FROM cantina";
$stmt = $connectar->query($sql);
$stmt->execute();
$quantidades = $stmt->fetchAll();

?>

<div class="tabela">
<table border="1px">
	<tr>
		<?php foreach($nomes as $nome){ ?>
		<th><?php echo $nome[0];?></th>
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
		<?php foreach($precoMINS as $precoMIN){ ?>
		<td><?php echo 'Preço Mínimo: ' . $precoMIN[0]; ?></td>
		<?php 
		}
		?>
	</tr>
	<tr>
		<?php foreach($valorVendas as $valorVenda){ ?>
		<td><?php echo 'Valor de Venda: ' . $valorVenda[0]; ?></td>
		<?php 
		}
		?>
	</tr>
	<tr>
		<?php foreach($valorCompras as $valorCompra){ ?>
		<td><?php echo 'Valor de Compra: ' . $valorCompra[0]; ?></td>
		<?php 
		}
		?>
	</tr>
	<tr>
		<?php foreach($quantidades as $quantidade){ ?>
			<td><?php echo 'Quantidade: ' . $quantidade[0]; ?></td>
			<?php 
			}
			?>
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