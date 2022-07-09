<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloContribuintesAPM.css">
	<meta charset="UTF-8" />
	<title>Gerenciamento APM</title>
	<style type="text/css">
		body{
			padding: 0 15%;
		}
		
		.rodape{
			padding: 0 30%;
		}
	</style>
</head>
<body>
	<div class="titulo"><h1>Contrato</h1></div>
	<?php
	require_once("BD/connectarBD.php");
	setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');

	$sql = "SELECT clausula FROM clausulas";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$clausula = $stmt->fetchAll();

	 if(isset($_POST['nome']) && isset($_POST['aluno']) && isset($_POST['rg']) && isset($_POST['cpf']) && isset($_POST['rua']) &&
	  isset($_POST['numero']) && isset($_POST['bairro']) && isset($_POST['armario'])  && isset($_POST['lugar']) && isset($_POST['valor']) && $_POST['nome'] != null)
	 {
	 	$nome = $_POST['nome'];
	 	$aluno = $_POST['aluno'];
	 	$rg = $_POST['rg'];
	 	$cpf = $_POST['cpf'];
	 	$rua = $_POST['rua'];
	 	$numero = $_POST['numero'];
	 	$bairro = $_POST['bairro'];
	 	$armario = $_POST['armario'];
	 	$lugar = $_POST['lugar'];
	 	$valor = $_POST['valor'];

	 ; ?>
	 <!--///////////////////////////////////////////Contrato e Clausulas//////////////////////////////////////////////////////////////// -->
		<p>TERMO DE LOCAÇÃO DE ARMÁRIO – nº <?php echo $armario; ?>/2021<br>

Eu, <?php echo $nome; ?>, portador do RG <?php echo $rg; ?> e CPF <?php echo $cpf; ?> e domiciliado à Rua: <?php echo $rua; ?> nº <?php echo $numero; ?> Bairro: 
<?php  echo $bairro; ?> responsável pelo(a) aluno(a) <?php echo $aluno; ?> regularmente matriculado no curso Ensino Médio Regular solicito a locação de um armário.<br>

<p> <?php echo $clausula[0][0]; ?> </p>

<?php echo 'Sendo assim o armário de número: ' . $armario . ' localizado no : ' . $lugar . ' no valor de: R$' . $valor; ?>

<br><br>

<div class="rodape">
Itapira,<?php  echo ' '.date('d').' '; ?>de <?php echo ucwords(strftime("%B")); ?> de <?php  echo ' '.date('Y').' '; ?><br><br>

Ass. LOCATÁRIO ____________________  <br><br><br>  Ass.  LOCADOR _____________________<br><br><br>

PROTOCOLO DE LOCAÇÃO DE ARMÁRIO – nº <?php echo $armario; ?>/<?php  echo ' '.date('Y').' '; ?>
<br><br><br>

DATA: _____/<?php echo ucwords(strftime("%m")); ?>/<?php  echo ' '.date('Y').' '; ?><br><br>
Ass. LOCADOR _____________________
</p>
</div>
<?php 

//registro dos dados no banco de dados
$sql = $connectar->prepare("INSERT INTO contratos VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->execute([$nome, $aluno, $rg, $cpf, $rua, $numero, $bairro, $valor, $armario]);
//echo 'dados registrados!';
} else {
 echo '<br>Campos preenchidos incorretamente!';
}

//Locar o armario do contrato
$situacao = 'Ocupado';

$sql = "UPDATE armarios SET nome = :nome WHERE numero = :armario";
$stmt = $connectar->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':armario', $armario);
$stmt->execute();

$sql = "UPDATE  armarios SET situacao = :situacao WHERE numero = :armario";
$stmt = $connectar->prepare($sql);
$stmt->bindParam(':situacao', $situacao);
$stmt->bindParam(':armario', $armario);
$stmt->execute();
 ?>

</body>
</html>
