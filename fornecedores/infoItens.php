
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloFornecedores.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>


<?php
require_once("BD/connectarBD.php");

$sql = "SELECT nome FROM fornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomes = $stmt->fetchAll();

$sql = "SELECT produto FROM fornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$produtos = $stmt->fetchAll();

$sql = "SELECT precoMIN FROM fornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMINS = $stmt->fetchAll();

$sql = "SELECT precoMAX FROM fornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMAXS = $stmt->fetchAll();

$sql = "SELECT valorCompra FROM fornecedores";
$stmt = $connectar->prepare($sql);
$stmt->execute();
$valorCompras = $stmt->fetchAll();

$sql = "SELECT quantidade FROM fornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$quantidades = $stmt->fetchAll();

$sql = "SELECT notaFiscal FROM fornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$notaFiscais = $stmt->fetchAll();

$sql = "SELECT dataPagamento FROM fornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$dataPagamentos = $stmt->fetchAll();

$sql = "SELECT dataRecebimento FROM fornecedores";
$stmt = $connectar->query($sql);
$stmt->execute();
$dataRecebimentos = $stmt->fetchAll();

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
		<?php foreach($produtos as $produto){ ?>
		<td><?php echo 'Produto: ' . $produto[0]; ?></td>
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
	<tr>
		<?php foreach($notaFiscais as $notaFiscal){ ?>
			<td><?php echo 'Nota Fiscal: ' . $notaFiscal[0]; ?></td>
			<?php 
			}
			?>
	</tr>
	<tr>
		<?php foreach($dataPagamentos as $dataPagamento){ ?>
			<td><?php echo 'Data de Pagamento: ' . $dataPagamento[0]; ?></td>
			<?php 
			}
			?>
	</tr>
		<tr>
		<?php foreach($dataRecebimentos as $dataRecebimento){ ?>
			<td><?php echo 'Data de Recebimento: ' . $dataRecebimento[0]; ?></td>
			<?php 
			}
			?>
	</tr>
</table>

</body>
</html>