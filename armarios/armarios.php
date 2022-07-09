<?php 
session_start();
require_once("BD/connectarBD.php");


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloArmarios.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<div class="titulo"><h1>Armarios</h1></div>
	<?php
	$sql = "SELECT nome FROM armarios WHERE situacao = 'Ocupado'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT numero FROM armarios WHERE situacao = 'Ocupado'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$numeros = $stmt->fetchAll();

	//indice para controle de fluxo de numeros
	$indice = 0;
	?>
	<div class="tabela">
	<?php
	foreach($nomes as $nome){
		?>
		
		<div class="armarios">
			<h1><?php echo $nome[0]; ?></h1>
			<h1><?php echo $numeros[$indice][0] ?></h1>
		</div>
	
		<style type="text/css">
			.tabela {
				height: 80%;
			}
			.armarios {
				border: solid 10px aquamarine;
				border-radius: 20px;
				padding: 1%;
			}
		</style>
		<?php
		$indice++;
		echo '<br>';
	}

	?>
</div>
	<a href="visualizar.php">
		<div class="opcoes">
			<h1>Visualizar</h1>
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
