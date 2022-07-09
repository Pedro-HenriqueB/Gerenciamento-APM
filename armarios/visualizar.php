<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloArmarios.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
	<style type="text/css">
		body{
			padding: 2% 4%;
			margin-left: 12%;
			font-weight: 800;
		}

		.Ocupado {
			border: solid black 3px;
			border-radius: 20px;
			margin: 2%;
			width: 20%;
			padding: 2%;
			display: inline-block;
			background-color: rgba(255, 0, 0, 0.8);
		}

		.Manutencao{
			border: solid black 3px;
			border-radius: 20px;
			margin: 2%;
			width: 20%;
			padding: 2%;
			display: inline-block;
			background-color: rgba(0, 183, 255, 0.5);
		}

		.Defeito{
			border: solid black 3px;
			border-radius: 20px;
			margin: 2%;
			width: 20%;
			padding: 2%;
			display: inline-block;
			background-color: rgba(255, 255, 0, 0.6);
		}

		.Disponivel{
			border: solid black 3px;
			border-radius: 20px;
			margin: 2%;
			width: 20%;
			padding: 2%;
			display: inline-block;
		}
	</style>
</head>
<body>
	<?php 
	require_once("BD/connectarBD.php");
	$sql = "SELECT nome FROM armarios";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT numero FROM armarios";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$numeros = $stmt->fetchAll();

	$sql = "SELECT situacao FROM armarios";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$situacoes = $stmt->fetchAll();

	 ?>
	<div class="titulo"><h1>Armarios</h1></div>
	<form method="post">

	<?php
	//Disponivel 
	$sql = "SELECT nome FROM armarios WHERE situacao = 'Disponivel'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT numero FROM armarios WHERE situacao = 'Disponivel'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$numeros = $stmt->fetchAll();

	$sql = "SELECT situacao FROM armarios WHERE situacao = 'Disponivel'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$situacoes = $stmt->fetchAll();

	$quantidadeDisponivel = 0;
	$indice = 0;
	foreach ($nomes as $nome) {
		$quantidadeDisponivel++;
	}

	//ocupado
	$sql = "SELECT nome FROM armarios WHERE situacao = 'Ocupado'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT numero FROM armarios WHERE situacao = 'Ocupado'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$numeros = $stmt->fetchAll();

	$sql = "SELECT situacao FROM armarios WHERE situacao = 'Ocupado'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$situacoes = $stmt->fetchAll();

	$quantidadeOcupado = 0;
	$indice = 0;
	foreach ($nomes as $nome) {
		$quantidadeOcupado++;
	}

	//Defeito
	$sql = "SELECT nome FROM armarios WHERE situacao = 'Defeito'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT numero FROM armarios WHERE situacao = 'Defeito'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$numeros = $stmt->fetchAll();

	$sql = "SELECT situacao FROM armarios WHERE situacao = 'Defeito'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$situacoes = $stmt->fetchAll();

	$quantidadeDefeito = 0;
	$indice = 0;
	foreach ($nomes as $nome) {
		$quantidadeDefeito++;
	}

	//Manutencao
	$sql = "SELECT nome FROM armarios WHERE situacao = 'Manutencao'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT numero FROM armarios WHERE situacao = 'Manutencao'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$numeros = $stmt->fetchAll();

	$sql = "SELECT situacao FROM armarios WHERE situacao = 'Manutencao'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$situacoes = $stmt->fetchAll();

	$quantidadeMnutencao = 0;
	$indice = 0;
	foreach ($nomes as $nome) {
		$quantidadeMnutencao++;
	}
 	?>

 	<label>Disponiveis: <?php echo $quantidadeDisponivel; ?></label>
 	<label>Ocupados: <?php echo $quantidadeOcupado; ?></label>
 	<label>Defeituosos: <?php echo $quantidadeDefeito; ?></label>
 	<label>Manutenção: <?php echo $quantidadeMnutencao; ?></label>
 	<br>
	<select name="situacao">
	<option name="Disponivel">Díspoivel</option>
	<option name="Ocupado">Ocupado</option>
	<option name="Defeito">Defeito</option>
	<option name="Manutencao">Manutenção</option>
	<option name="Todos">Todos</option>
	</select>
	<br>
	<input type="submit" name="selecionar" value="Selecionar">	
	</form>
	<?php
	if(isset($_POST['situacao']))
	{
		$situacao = $_POST['situacao'];
	} else {
		$situacao = null;
	}
	session_start();
	echo '<br>';
	$quantidade = 19;
	$indice = 0;

	echo '<br>';
	switch ($situacao) {
		case 'Díspoivel':
			$sql = "SELECT nome FROM armarios WHERE situacao = 'Disponivel'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomes = $stmt->fetchAll();

			$sql = "SELECT numero FROM armarios WHERE situacao = 'Disponivel'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$numeros = $stmt->fetchAll();

			$sql = "SELECT situacao FROM armarios WHERE situacao = 'Disponivel'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$situacoes = $stmt->fetchAll();

			$quantidade = 0;
			$indice = 0;
			foreach ($nomes as $nome) {
				$quantidade++;
			}

			while($indice <= ($quantidade - 1)){
			?>
			<div class="<?=$situacoes[$indice][0];?>">
			<form method="post" action="baixaArmarios.php">

			<label for="nome"><?php echo $nomes[$indice][0]; ?></label>
			<input type="text" name="nome">
			<br>

			<label for="numero">Numero:<?php echo $numeros[$indice][0];?> </label>
			<br>
			<input type="number" name="numero" value="<?php echo $numeros[$indice][0]; ?>">

			<br>
			<label for="situacao"><?php echo $situacoes[$indice][0]; ?></label>
			<br>
			<select name="situacao">
				<option value="Disponivel">Disponivel</option>
				<option value="Ocupado">Ocupado</option>
				<option value="Manutencao">Manutenção</option>
				<option value="Defeito">Defeito</option>
			</select>
			<br>
			<input type="submit" name="alocar" value="Alocar">
			</form>
		</div>
		<?php
	$indice++;	
		
	}

			break;

		case 'Ocupado':
			$sql = "SELECT nome FROM armarios WHERE situacao = 'Ocupado'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomes = $stmt->fetchAll();

			$sql = "SELECT numero FROM armarios WHERE situacao = 'Ocupado'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$numeros = $stmt->fetchAll();

			$sql = "SELECT situacao FROM armarios WHERE situacao = 'Ocupado'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$situacoes = $stmt->fetchAll();

			$quantidade = 0;
			$indice = 0;
			foreach ($nomes as $nome) {
				$quantidade++;
			}

			while($indice <= ($quantidade - 1)){
			?>
			<div class="<?=$situacoes[$indice][0];?>">
			<form method="post" action="baixaArmarios.php">

			<label for="nome"><?php echo $nomes[$indice][0]; ?></label>
			<input type="text" name="nome">
			<br>

			<label for="numero">Numero:<?php echo $numeros[$indice][0];?> </label>
			<br>
			<input type="number" name="numero" value="<?php echo $numeros[$indice][0]; ?>">

			<br>
			<label for="situacao"><?php echo $situacoes[$indice][0]; ?></label>
			<br>
			<select name="situacao">
				<option value="Disponivel">Disponivel</option>
				<option value="Ocupado">Ocupado</option>
				<option value="Manutencao">Manutenção</option>
				<option value="Defeito">Defeito</option>
			</select>
			<br>
			<input type="submit" name="alocar" value="Alocar">
			</form>
		</div>
		<?php
	$indice++;	
		
	}

			break;

		case 'Defeito':
			$sql = "SELECT nome FROM armarios WHERE situacao = 'Defeito'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomes = $stmt->fetchAll();

			$sql = "SELECT numero FROM armarios WHERE situacao = 'Defeito'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$numeros = $stmt->fetchAll();

			$sql = "SELECT situacao FROM armarios WHERE situacao = 'Defeito'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$situacoes = $stmt->fetchAll();

			$quantidade = 0;
			$indice = 0;
			foreach ($nomes as $nome) {
				$quantidade++;
			}

			while($indice <= ($quantidade - 1)){
			?>
			<div class="<?=$situacoes[$indice][0];?>">
			<form method="post" action="baixaArmarios.php">

			<label for="nome"><?php echo $nomes[$indice][0]; ?></label>
			<input type="text" name="nome">
			<br>

			<label for="numero">Numero:<?php echo $numeros[$indice][0];?> </label>
			<br>
			<input type="number" name="numero" value="<?php echo $numeros[$indice][0]; ?>">

			<br>
			<label for="situacao"><?php echo $situacoes[$indice][0]; ?></label>
			<br>
			<select name="situacao">
				<option value="Disponivel">Disponivel</option>
				<option value="Ocupado">Ocupado</option>
				<option value="Manutencao">Manutenção</option>
				<option value="Defeito">Defeito</option>
			</select>
			<br>
			<input type="submit" name="alocar" value="Alocar">
			</form>
		</div>
		<?php
	$indice++;	
		
	}

			break;

		case 'Manutenção':
			$sql = "SELECT nome FROM armarios WHERE situacao = 'Manutencao'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomes = $stmt->fetchAll();

			$sql = "SELECT numero FROM armarios WHERE situacao = 'Manutencao'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$numeros = $stmt->fetchAll();

			$sql = "SELECT situacao FROM armarios WHERE situacao = 'Manutencao'";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$situacoes = $stmt->fetchAll();

			$quantidade = 0;
			$indice = 0;
			foreach ($nomes as $nome) {
				$quantidade++;
			}

			while($indice <= ($quantidade - 1)){
			?>
			<div class="<?=$situacoes[$indice][0];?>">
			<form method="post" action="baixaArmarios.php">

			<label for="nome"><?php echo $nomes[$indice][0]; ?></label>
			<input type="text" name="nome">
			<br>

			<label for="numero">Numero:<?php echo $numeros[$indice][0];?> </label>
			<br>
			<input type="number" name="numero" value="<?php echo $numeros[$indice][0]; ?>">

			<br>
			<label for="situacao"><?php echo $situacoes[$indice][0]; ?></label>
			<br>
			<select name="situacao">
				<option value="Disponivel">Disponivel</option>
				<option value="Ocupado">Ocupado</option>
				<option value="Manutencao">Manutenção</option>
				<option value="Defeito">Defeito</option>
			</select>
			<br>
			<input type="submit" name="alocar" value="Alocar">
			</form>
		</div>
		<?php
	$indice++;	
		
	}

			break;

		case 'Todos':
			$sql = "SELECT nome FROM armarios";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomes = $stmt->fetchAll();

			$sql = "SELECT numero FROM armarios";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$numeros = $stmt->fetchAll();

			$sql = "SELECT situacao FROM armarios";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$situacoes = $stmt->fetchAll();
			while($indice <= $quantidade){
			?>
			<div class="<?=$situacoes[$indice][0];?>">
			<form method="post" action="baixaArmarios.php">

			<label for="nome"><?php echo $nomes[$indice][0]; ?></label>
			<input type="text" name="nome">
			<br>

			<label for="numero">Numero:<?php echo $numeros[$indice][0];?> </label>
			<br>
			<input type="number" name="numero" value="<?php echo $numeros[$indice][0]; ?>">

			<br>
			<label for="situacao"><?php echo $situacoes[$indice][0]; ?></label>
			<br>
			<select name="situacao">
				<option value="Disponivel">Disponivel</option>
				<option value="Ocupado">Ocupado</option>
				<option value="Manutencao">Manutenção</option>
				<option value="Defeito">Defeito</option>
			</select>
			<br>
			<input type="submit" name="alocar" value="Alocar">
			</form>
		</div>
		<?php
	$indice++;	
		
	}
			break;
		
		default:
			$sql = "SELECT nome FROM armarios";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$nomes = $stmt->fetchAll();

			$sql = "SELECT numero FROM armarios";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$numeros = $stmt->fetchAll();

			$sql = "SELECT situacao FROM armarios";
			$stmt = $connectar->query($sql);
			$stmt->execute();
			$situacoes = $stmt->fetchAll();
			while($indice <= $quantidade){
			?>
			<div class="<?=$situacoes[$indice][0];?>">
			<form method="post" action="baixaArmarios.php">

			<label for="nome"><?php echo $nomes[$indice][0]; ?></label>
			<input type="text" name="nome">
			<br>

			<label for="numero">Numero:<?php echo $numeros[$indice][0];?> </label>
			<br>
			<input type="number" name="numero" value="<?php echo $numeros[$indice][0]; ?>">

			<br>
			<label for="situacao"><?php echo $situacoes[$indice][0]; ?></label>
			<br>
			<select name="situacao">
				<option value="Disponivel">Disponivel</option>
				<option value="Ocupado">Ocupado</option>
				<option value="Manutencao">Manutenção</option>
				<option value="Defeito">Defeito</option>
			</select>
			<br>
			<input type="submit" name="alocar" value="Alocar">
			</form>
		</div>
		<?php
	$indice++;	
		
	}
			break;
	}

	 ?>
	 <a href="armarios.php">
		<div class="opcoes">
			<h1>Voltar</h1>
		</div>
	</a>
</body>
</html>