<?php 
session_start();
require_once("BD/connectarBD.php");


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloCantina.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<div class="titulo"><h1>Cantina</h1></div>
	<?php 
	$sql = "SELECT nome FROM cantina";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT quantidade FROM cantina";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$qtdUnidades = $stmt->fetchAll();
	?>
	<div class="tabela">
	<table border="1px">
		<tr>
			<?php
			//Tabela com nomes e quantidades
			foreach($nomes as $nome){
			?>
			<th>
			<?php echo $nome[0]; } ?>
			</th>
		</tr>
		<tr>
			<?php
			foreach($qtdUnidades as $qtdUnidade){
			?>
			<td>
				<?php echo $qtdUnidade[0]; } ?>
			</td>
		</tr>
	</table>
	</div>
	<?php echo '<br>' ?>

	<form method="post" action="cantina.php">
	<label for="operacao">Tipo de Operação:</label>
			<select id="opcoes" name="opcoes">
				<option value="1">Entrada</option>
				<option value="2">Saida</option>
			</select>

	<label for="pagamento">Tipo de Pagamento:</label>
	<select id="tipoPagamento" name="tipoPagamento">
		<option value="Dinheiro">Dinheiro</option>
		<option value="Cartao">Cartão</option>
		<option value="Pix">Pix</option>
		<option value="Cheque">Cheque</option>
	</select>	
	<input type="submit" name="enviar" value="Enviar">
	</form>

	<?php
	//Campo para quantidade de Baixa
	$opcao = "";
	$tipoPagamento = "";
	if(isset($_POST['tipoPagamento'])){
		$tipoPagamento = $_POST['tipoPagamento'];
	}

	if(isset($_POST['opcoes'])){
		if($_POST['opcoes'] == 1){
			$opcao = "entradaBaixa.php";
		} else if($_POST['opcoes'] == 2){
			$opcao = "saidaBaixa.php";
		} else {
			echo 'valor de opcao incorreta';
		}
	}
		if(isset($_POST['opcoes'])){
		if($_POST['opcoes'] == 1){
			echo 'Operação selecionada: Entrada / ' . $tipoPagamento;
		} else if($_POST['opcoes'] == 2){
			echo 'Operação selecionada: Saida / ' . $tipoPagamento;
		} else {
			echo 'valor de opcao incorreta';
		}
	}

	echo '<br>';
	?>
	<div class="bg">
	<?php foreach($nomes as $nome) { ?>
		<form method="post" action="<?=$opcao?>">
		<div class="nomes"><?php echo $nome[0]; //input para inserir as quantidades para dar baixa ?></div>
		<div class="inputs"><input type="number" id="<?=$nome[0]?>" name="<?=$nome[0]?>"></div>

	<?php 		
	}
	$_SESSION['pagamento'] = $tipoPagamento;
	?>

		<input type="submit" name="enviar" value="Baixa">
		</form>
		</div>

	<a href="addItens.php">
		<div class="opcoes">
			<h1>Adicionar novo item</h1>
		</div>
	</a>
	<a href="excluirItens.php">
		<div class="opcoes">
			<h1>Excluir item</h1>
		</div>
	</a>
		<a href="balanco.php">
		<div class="opcoes">
			<h1>Balanço</h1>
		</div>
	</a>
	</a>
		<a href="caixa.php">
		<div class="opcoes">
			<h1>Caixa</h1>
		</div>
	</a>
	</a>
		<a href="infoItens.php">
		<div class="opcoes">
			<h1>Informações de itens</h1>
		</div>
	</a>
	<a href="../index.php">
		<div class="opcoes">
			<h1>Voltar</h1>
		</div>
	</a>
</body>
</html>

<?php 
/*
	echo '<br><br>';
	//indice e foreach para contar e controlar quandos posts são recebidos
	$i = 0;	
	foreach($_POST as $valores){
		$i++;
	}
	

	echo '<br><br>';


	//TESTES

	//print_r($_POST['opcoes']);
	/*$indice3 = 0;
	while($indice3 < ($i-1)){
		$_POST[$uniformes[$indice3][0]] = 0;
		$indice3++;
	}
	session_destroy();
	*/

	/*FUNÇÃO INSERIR NO BANCO DE DADOS
	$indice2 = 0;
	$novoValor = 0;
	while($indice2 < ($i-1)){
		$novoValor = $qtdUniformes[$indice2][0];
		$novoValor -= $_POST[$uniformes[$indice2][0]];
		echo $novoValor;
		echo '<br><br>';
		$indice2++;
	}
*/

/*
		como o SQL deve ficar para receber as variaveis corretas
		//$sql = "UPDATE uniformes SET quantidade = :qtdUniforme WHERE nome = :nome";
		//$stmt = $connectar->prepare($sql);
		//$stmt->bindParam(':qtdUniforme', $novoValor);
		//$stmt->bindParam(':nome', $uniformes[$indice2][0]);
		//$stmt->execute();
*/


/*
	echo '<br><br>';
	echo 'Quandidade de uniformes no BD<br>';
	foreach($qtdUniformes as $qtdUniforme){
		echo $qtdUniforme[0];
		echo ",";
	}


	echo '<br>';
	echo 'Quantidade de uniformes no POST<br>';
	foreach($uniformes as $uniforme){
		print_r($_POST[$uniforme[0]]);
		echo ", ";
	}

echo '<br><br>';
//usar esse método dentro do foreach qtdUniformes com indice para cada uniforme na primeira posição
print_r($uniformes[0][0]);
echo '<br><br>';
print_r($_POST[$uniformes[1][0]]);
echo '<br><br>';
print_r($qtdUniformes[0][0]);



		$i=0;
		echo($qtdUniformes[$i][0]);
		echo '<br><br>';
		echo($_POST[$uniformes[$i][0]]);
		echo '<br>';
*/

//$i = 0;

		//print_r($_POST[$uniformes[$i][0]]);
		/*$qtdUniformes[$i][0] -= $_POST[$uniformes[$i][0]];
		
		echo $qtdUniformes[0][0];

		echo '<br><br>';

		echo $_POST[$uniformes[0][0]];		
*/

		//print_r($_POST[$uniformes[0][0]]);


		/* função que retorna os valores corretos de cada variavel necessária alterando o indice pela variavel $indice2
			$indice2 = 0;
			while($indice2 < $i){
			echo 'valor de qtd';
			echo '<br>';
			echo $qtdUniformes[$indice2][0];
			echo '<br>';
			echo 'Valor de post uniformes';
			echo '<br>';
			echo $_POST[$uniformes[$indice2][0]];
			echo '<br>';
			$indice2++; 
	}





	//array com nomes dos uniformes
	print_r($uniformes[0][0]);
	*/
?>
