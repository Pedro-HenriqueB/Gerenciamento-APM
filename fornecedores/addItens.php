<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloFornecedores.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<div class="bg">
	<form method="post">
		<div class="nomes"><label for="nome">Nome:</label></div>
		<div class="inputs"><input type="text" id="nome" name="nome"></div>

		<div class="nomes"><label for="produto">Produto:</label></div>
		<div class="inputs"><input type="text" id="produto" name="produto"></div>

		<div class="nomes"><label for="precoMIN">Preço Minimo:</label></div>
		<div class="nomes"><input type="float" id="precoMIN" name="precoMIN"></div>

		<div class="nomes"><label for="precoMAX">Preço Máximo:</label></div>
		<div class="nomes"><input type="float" id="precoMAX" name="precoMAX"></div>

		<div class="nomes"><label for="valorCompra">ValorCompra:</label></div>
		<div class="nomes"><input type="float" id="valorCompra" name="valorCompra"></div>

		<div class="nomes"><label for="quantidade">Quantidade:</label></div>
		<div class="nomes"><input type="number" id="quantidade" name="quantidade"></div>

		<div class="nomes"><label for="notaFiscal">Nota Fiscal:</label></div>
		<div class="nomes"><input type="text" id="notaFiscal" name="notaFiscal"></div>

		<div class="nomes"><label for="dataPagamento">Data de Pagamento:</label></div>
		<div class="nomes"><input type="date" id="dataPagamento" name="dataPagamento"></div>

		<div class="nomes"><label for="dataRecebimento">Data de Recebimento:</label></div>
		<div class="nomes"><input type="date" id="dataRecebimento" name="dataRecebimento"></div>

		<br>
		<input type="submit" value="Adicionar">
	</form>
	</div>

	<?php 
	session_start();
	require_once("BD/connectarBD.php");

	if(isset($_POST['nome']) && isset($_POST['produto']) && isset($_POST['precoMIN']) && 
		isset($_POST['precoMAX']) && isset($_POST['valorCompra']) && isset($_POST['quantidade']) && 
		isset($_POST['notaFiscal']) && isset($_POST['dataPagamento']) && isset($_POST['dataRecebimento'])){

		$nome = $_POST['nome'];
		$produto = $_POST['produto'];
		$precoMIN = $_POST['precoMIN'];
		$precoMAX = $_POST['precoMAX'];
		$valorCompra = $_POST['valorCompra'];
		$quantidade = $_POST['quantidade'];
		$notaFiscal = $_POST['notaFiscal'];
		$dataPagamento = $_POST['dataPagamento'];
		$dataRecebimento = $_POST['dataRecebimento'];

		$sql = $connectar->prepare("INSERT INTO fornecedores VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$sql->execute([$nome, $produto, $precoMIN, $precoMAX, $valorCompra, 
						$quantidade, $notaFiscal, $dataPagamento, $dataRecebimento]);
		echo '<br>Dados registrados!';
		session_destroy();
	} else {
		echo '<br>Insira os valores nos devidos campos! (Sem espaços!)';
	}


	?>

<a href="fornecedores.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>

</body>
</html>

