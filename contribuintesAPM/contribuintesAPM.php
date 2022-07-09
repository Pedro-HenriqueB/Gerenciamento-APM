<?php 
session_start();
require_once("BD/connectarBD.php");


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloContribuintesAPM.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
	<style type="text/css">
		table{
			display: inline-block;
		}

		.tabela {
			max-height: 300px;
		}

	</style>
</head>
<body>
	<div class="titulo"><h1>Contribuintes APM</h1></div>
	<?php
	require_once("BD/connectarBD.php");
	$sql = "SELECT nome FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT id FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$ids = $stmt->fetchAll();

	$sql = "SELECT valor FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$valores = $stmt->fetchAll();

	$sql = "SELECT periodo FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$periodos = $stmt->fetchAll();

	$sql = "SELECT data FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$anos = $stmt->fetchAll();

	$sql = "SELECT situacao FROM contribuintes";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$situacoes = $stmt->fetchAll();

	?>
	<div class="tabela">
	<?php 
	$indice = 0;
		foreach ($ids as $id) { ?>
			<table>
				<tr>
					<form method="post" action="update.php">
					<th><?php echo $nomes[$indice][0]; ?></th>
				</tr>
				<tr>
					<td><input type="number" name="id" value="<?php echo $ids[$indice][0]; ?>"></td>
				</tr>
				<tr>
					<td><?php echo 'R$ '.$valores[$indice][0]; ?></td>
				</tr>
				<tr>
					<td><?php echo 'periodo: '.$periodos[$indice][0];?></td>
				</tr>
				<tr>
					<td>
					<?php $data = new DateTime($anos[$indice][0]); echo 'Ano: '.$data->format('Y'); ?>
				</td>
				</tr>
				<tr>
					<td>
					<?php echo $situacoes[$indice][0]; ?>
					<select name="situacao">
						<option value="Ativo">Ativo</option>
						<option value="Inativo">Inativo</option>
					</select>
					<input type="submit" name="alterar" value="Alterar">
				</td>

			</form>
		</tr>
			</table>
			<?php $indice++; } ?>
	</div>


	<a href="addItens.php">
		<div class="opcoes">
			<h1>Adicionar novo contribuinte</h1>
		</div>
	</a>
	<a href="excluirItens.php">
		<div class="opcoes">
			<h1>Excluir contribuinte</h1>
		</div>
	</a>
	<a href="gerarContrato.php">
		<div class="opcoes">
			<h1>Gerar Contrato</h1>
		</div>
	</a>
	<a href="clausulas.php">
		<div class="opcoes">
			<h1>Clausulas</h1>
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

/*<table>
		<tr>
			<form method="post" action="update.php">
			<?php foreach($nomes as $nome){ ?>
				<th><?php echo $nome[0];} ?></th>
		</tr>
		<tr>
			<?php foreach($ids as $id){ ?>
				<td><input type="number" name="id" value="<?php echo $id[0]; ?>"></td>
			<?php } ?>
		</tr>
		<tr>
			<?php foreach($valores as $valor){ ?>
				<td><?php echo 'R$ '.$valor[0]; } ?></td>
		</tr>
		<tr>
			<?php foreach($periodos as $periodo){ ?>
				<td>
					<?php echo 'periodo: '.$periodo[0]; } ?>
				</td>
		</tr>
		<tr>
			<?php foreach($anos as $ano){ ?>
				<td>
					<?php $data = new DateTime($ano[0]); echo 'Ano: '.$data->format('Y'); } ?>
				</td>
		</tr>
		<tr>
			
			<?php foreach($situacoes as $situacao){ ?>
				<td>
					<?php echo $situacao[0]; ?>
					<select name="situacao">
						<option value="Ativo">Ativo</option>
						<option value="Inativo">Inativo</option>
					</select>
					<input type="submit" name="alterar" value="Alterar">
				<?php } ?>
				</td>
			</form>
		</tr>
	</table>
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
