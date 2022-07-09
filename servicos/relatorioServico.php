<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloServicos.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>

<div class="titulo"><h1>Relatórios Serviços</h1></div>

<?php
require_once("BD/connectarBD.php");

$sql = "SELECT nome FROM registroServicos";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomes = $stmt->fetchAll();

$sql = "SELECT servico FROM registroServicos";
$stmt = $connectar->query($sql);
$stmt->execute();
$servicos = $stmt->fetchAll();

$sql = "SELECT valor FROM registroServicos";
$stmt = $connectar->prepare($sql);
$stmt->execute();
$valores = $stmt->fetchAll();

$sql = "SELECT data FROM registroServicos";
$stmt = $connectar->prepare($sql);
$stmt->execute();
$datas = $stmt->fetchAll();
?>
<div class="tabela">
<table>

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
		<?php foreach($valores as $valorCompra){ ?>
		<td><?php echo 'Valor de Compra: ' . $valorCompra[0]; ?></td>
		<?php 
		}
		?>
	</tr>
	<tr>
		<?php foreach($datas as $data){ ?>
		<td><?php echo 'Valor de Compra: ' . $data[0]; ?></td>
		<?php 
		}
		?>
	</tr>
</table>
</div>
<a href="servicos.php">
		<div class="opcoes">
			<h1>Voltar</h1>
		</div>
	</a>
</div>
</body>
</html>