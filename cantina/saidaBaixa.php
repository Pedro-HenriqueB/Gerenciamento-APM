<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estilo.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  margin: 0% 37%;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
	<div class="loader"></div>

	<?php 
	session_start();
	require_once("BD/connectarBD.php");
	$sql = "SELECT nome FROM cantina";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT quantidade FROM cantina";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$qtdUnidades = $stmt->fetchAll();

	$sql = "SELECT valorVenda FROM cantina";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valorVendas = $stmt->fetchAll();

	$sql = "SELECT valorCompra FROM cantina";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valorCompras = $stmt->fetchAll();

	echo '<br><br>';
	//indice e foreach para contar e controlar quandos posts são recebidos
	$i = 0;	
	foreach($_POST as $posts){
		$i++;
	}

	//Variaveis para registro no BD e controle de indice
	$indice2 = 0;
	$novoValor = 0;
	$qtdRegistro = 0;
	$tipoPagamento = $_SESSION['pagamento'];

	//LOOP para registro de cada item no BD
	while($indice2 < ($i-1)){
		if(isset($_POST[$nomes[$indice2][0]])){
			$novoValor = (int)$qtdUnidades[$indice2][0];
			$novoValor -= (int)$_POST[$nomes[$indice2][0]];
			$sql = "UPDATE cantina SET quantidade = :qtdUnidades WHERE nome = :nome";
			$stmt = $connectar->prepare($sql);
			$stmt->bindParam(':qtdUnidades', $novoValor);
			$stmt->bindParam(':nome', $nomes[$indice2][0]);
			$stmt->execute();
			//echo $novoValor;
			//echo '<br><br>';

			$qtdRegistro = $_POST[$nomes[$indice2][0]];
			if($qtdRegistro > 0){
			$novoValor = (float)$qtdRegistro * (float)$valorVendas[$indice2][0];
			$sql = ("INSERT INTO registroCantina VALUE(null, ?, ?, ?, null, ?, null)");
			$stmt = $connectar->prepare($sql);
			$stmt->execute([$nomes[$indice2][0], $qtdRegistro, $novoValor, $tipoPagamento]);
			
			//echo $uniformes[$indice2][0] .'<br>' . $qtdRegistro . '<br>' . $novoValor;
		}
		}
		$indice2++;
	}
	
	$url = "http://127.0.0.1/gerenciamentoapm/cantina/cantina.php";
	echo '<META HTTP-EQUIV=REFRESH CONTENT ="1;' .$url. '">';
	//echo '<br><br>';
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
//TESTES
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

</body>
</html>

