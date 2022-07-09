
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estilo.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
	<style type="text/css">
		table{
			display: inline-block;
		}
		.tabela {
			max-height: 400px;
		}
	</style>
</head>
<body>


<?php
require_once("BD/connectarBD.php");

$sql = "SELECT id FROM uniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$ids = $stmt->fetchAll();

$sql = "SELECT nome FROM uniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomes = $stmt->fetchAll();

$sql = "SELECT precoMAX FROM uniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMAXS = $stmt->fetchAll();

$sql = "SELECT valor FROM uniformes";
$stmt = $connectar->prepare($sql);
$stmt->execute();
$valores = $stmt->fetchAll();

$sql = "SELECT precoMIN FROM uniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$precoMINS = $stmt->fetchAll();

$sql = "SELECT quantidade FROM uniformes";
$stmt = $connectar->query($sql);
$stmt->execute();
$quantidades = $stmt->fetchAll();

$indice = 0;
?>

<div class="tabela">
<?php foreach($nomes as $nome){ ?>
<table border="1px">
	<form method="post" action="updateItens.php">
	<tr>
		<td><?php echo 'ID:' ?><input type="number" name="id" value="<?php echo $ids[$indice][0];?>"></td>
	</tr>
	<tr>
		<td><?php echo 'Nome:' ?><input type="text" name="nome" value="<?php echo $nome[0];?>"></td>
	</tr>
	<tr>
		<td><?php echo 'Preço Máximo:' ?><input type="float" name="precoMAX" value="<?php echo $precoMAXS[$indice][0]; ?>"></td>
	</tr>
	<tr>
		<td><?php echo 'Valor:' ?><input type="float" name="valor" value="<?php echo $valores[$indice][0]; ?>"></td>
	</tr>
	<tr>
		<td><?php echo 'Preço Mínimo:' ?><input type="float" name="precoMIN" value="<?php echo $precoMINS[$indice][0]; ?>"></td>
	</tr>
	<tr>
			<td><?php echo 'Quantidade:' ?><input type="number" name="quantidade" value="<?php echo $quantidades[$indice][0]; ?>"><br><br>
			<input type="submit" name="Alterar" value="Alterar"></td>
	</tr>
</form>
</table>
<?php 
$indice++;
}
?>
</div>
<a href="uniformes.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>

</body>
</html>