<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloEventos.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<?php
	session_start();
	require_once("BD/connectarBD.php");
	$sql = "CREATE TABLE IF NOT EXISTS doacoes (
											nome VARCHAR(100) NOT NULL,
											valor DECIMAL(6,2),
											item VARCHAR(100)
										)";
	$resultado = $connectar->query($sql);
	if($resultado) {
		echo 'Tabela doações criada!';
	} else {
		echo 'Erro ao criar tabela doações!';
	}
	?>
	<div class="bg">
	<form method="post" action="baixaDoacoes.php">
	<label>Nome:</label>
	<input type="text" id="nome" name="nome">
	<label>Item:</label>
	<input type="text" id="item" name="item">
	<label>Valor:</label>
	<input type="float" id="valor" name="valor">
	<input type="submit" name="enviar" value="Enviar">
	</form>
	</div>
	<?php

	$sql = "SELECT nome FROM doacoes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT valor FROM doacoes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valores = $stmt->fetchAll();

	$sql = "SELECT item FROM doacoes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$items = $stmt->fetchAll();
	?>
	<table class="tabela">
	<?php  ?>
		<tr>
				<?php foreach($nomes as $nome){ ?>
				<td>
				 <?php echo $nome[0]; } ?>
				</td>	
		</tr>
		<tr>
				<?php foreach($valores as $valor){ ?>
					<td>
						<?php echo $valor[0]; } ?>
					</td>	
			</td>
		</tr>
		<tr>
			<?php foreach($items as $item){ ?>
				<td>
					<?php echo $item[0]; } ?>
				</td>
		</tr>
	<?php
	echo '<br>';

	?>
	</table>
	<a href="eventos.php">
		<div class="opcoes">
			<h1>Voltar</h1>
		</div>
	</a>

</body>
</html>