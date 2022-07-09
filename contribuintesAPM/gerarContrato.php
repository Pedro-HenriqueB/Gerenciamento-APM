<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloContribuintesAPM.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
	<style type="text/css">
		.tabela{
			margin: 0% 30%;
			overflow: scroll;
			max-height: 600px;
			display: inline-block;
			width: 60%;
		}
	</style>
</head>
<body>
	<div class="titulo"><h1>Gerar Contrato</h1></div>
	<div class="bg">
		<form method="post" action="contrato.php" target="_blank">
			<label>Nome:</label> <?php //form para os dadoscriar check box para o valor do contrato ?><br>
			<input type="text" name="nome"><br>
			<label>Aluno:</label><br>
			<input type="text" name="aluno"><br>
			<label>RG:</label><br>
			<input type="text" name="rg"><br>
			<label>CPF:</label><br>
			<input type="text" name="cpf"><br>
			<label>Rua:</label><br>
			<input type="text" name="rua"><br>
			<label>Número:</label><br>
			<input type="number" name="numero"><br>
			<label>Bairro:</label><br>
			<input type="text" name="bairro"><br>
			<label>Número Armário:</label><br>
			<input type="number" name="armario">
			<br>
			<label>Valor do contrato:</label>
			<input type="number" name="valor">
			<br><br>
				<input type="radio" id="piso" name="lugar" value="Piso Térreo">
				<label for="piso">Piso Térreo</label> <br>
				<input type="radio" id="terreo" name="lugar" value="Primeiro Andar">
				<label for="terreo">Primeiro Andar</label>
			<br><br>

			<input type="submit" name="enviar" value="Gerar">

		</form>
	</div>

<?php 
require_once("BD/connectarBD.php");

?>
<div class="bg">
<form method="post">
	<label>Nome:</label>
	<input type="text" name="excluirNome">
	<input type="submit" name="excluir" value="Excluir">
</form>
</div>

	<?php 
	if(isset($_POST['excluirNome'])){
		$nome = $_POST['excluirNome'];

		$sql = "DELETE FROM contratos WHERE nome = :nome";
		$stmt = $connectar->prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->execute();
		echo '<br>Registro excluido!';
	}

 	?>

<?php

$sql = "SELECT nome FROM contratos";
$stmt = $connectar->query($sql);
$stmt->execute();
$nomes = $stmt->fetchAll();

$sql = "SELECT aluno FROM contratos";
$stmt = $connectar->query($sql);
$stmt->execute();
$alunos = $stmt->fetchAll();

$sql = "SELECT rg FROM contratos";
$stmt = $connectar->query($sql);
$stmt->execute();
$rgs = $stmt->fetchAll();

$sql = "SELECT cpf FROM contratos";
$stmt = $connectar->query($sql);
$stmt->execute();
$cpfs = $stmt->fetchAll();

$sql = "SELECT rua FROM contratos";
$stmt = $connectar->query($sql);
$stmt->execute();
$ruas = $stmt->fetchAll();

$sql = "SELECT numero FROM contratos";
$stmt = $connectar->query($sql);
$stmt->execute();
$numeros = $stmt->fetchAll();

$sql = "SELECT bairro FROM contratos";
$stmt = $connectar->query($sql);
$stmt->execute();
$bairros = $stmt->fetchAll();

$sql = "SELECT armario FROM contratos";
$stmt = $connectar->query($sql);
$stmt->execute();
$armarios = $stmt->fetchAll();

$indice = 0;
?>
	<div class="tabela">

<?php
foreach($nomes as $nome){
	?>
		<table border="1px">
	<form method="post" action="contratosSalvos.php" target="_blank">
		<tr>
			<td>
				<label>Nome:</label>
				<input type="text" name="nome" value="<?php echo $nome[0]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label>Aluno:</label>
				<input type="text" name="aluno" value="<?php echo $alunos[$indice][0]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label>RG:</label>
				<input type="text" name="rg" value="<?php echo $rgs[$indice][0]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label>CPF:</label>
				<input type="text" name="cpf" value="<?php echo $cpfs[$indice][0]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label>Rua:</label>
				<input type="text" name="rua" value="<?php echo $ruas[$indice][0]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label>Número:</label>
				<input type="number" name="numero" value="<?php echo $numeros[$indice][0]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label>Bairro:</label>
				<input type="text" name="bairro" value="<?php echo $bairros[$indice][0]; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<label>Número Armário:</label>
				<input type="text" name="armario" value="<?php echo $armarios[$indice][0]; ?>">
			</td>
		</tr>
			<br>
			<br>
			<tr>
				<td>
					<label>Valor do contrato</label>
					<input type="number" name="valor">
			<br>
			<br>
			
					<input type="submit" name="enviar" value="Gerar">
				</td>
			</tr>
		</form>
	</table>
	
	<?php 
	$indice++;
}

?>

</div>

<a href="contribuintesAPM.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>
</body>
</html>