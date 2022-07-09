<?php 
session_start();
require_once("BD/connectarBD.php");

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloEventos.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<div class="titulo"><h1>Eventos</h1></div>
	<?php 
	//SELECT de evento para a lista de evento utilizando DISTINCT para nao repetir apenas na lista
	$sql = "SELECT DISTINCT evento FROM eventos";
	$stmt = $connectar->query($sql);
	$stmt ->execute();
	$eventosLista = $stmt->fetchAll();

	$sql = "SELECT evento FROM eventos";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$eventos = $stmt->fetchAll();

	$sql = "SELECT nome FROM eventos";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomes = $stmt->fetchAll();

	$sql = "SELECT quantidade FROM eventos";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$qtdUnidades = $stmt->fetchAll();

	?>
	<div class="tabela">
	<table border="1px">
		<tr>
			<?php
			//Tabela com nomes e quantidades
			foreach($eventos as $evento){
			?>
			<td>
			<?php echo $evento[0]; } ?>
			</td>
		</tr>
		<tr>
			<?php
			//Tabela com nomes e quantidades
			foreach($nomes as $nome){
			?>
			<td>
			<?php echo $nome[0]; } ?>
			</td>
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
	<?php $indice = 0;
			$diferenciar = "";
	 ?>
	<form method="post" action="eventos.php">
		<label for="operacao">Selecione o evento:</label>
			<select id="opcoesEventos" name="opcoesEventos">
				<?php  foreach($eventosLista as $eventoLista){ //Lista de eventos a ser selecionado ?>
				<option value="<?=$indice?>"><?php echo $eventoLista[0]; ?> </option>
												
				<?php $indice++; } ?>
			</select>
			<br><br>
	<label for="operacao">Tipo de Operação:</label>
			<select id="opcoes" name="opcoes">
				<option value="1">Entrada</option>
				<option value="2">Saida</option>
			</select>
	<input type="submit" name="enviar" value="Enviar">
	</form>

	<?php
	//Tipos de operações e redirecionamento
	if(isset($_POST['opcoesEventos'])){ 
		$opcaoEvento = $_POST['opcoesEventos'];
		$_SESSION['opcoesEventos'] = $opcaoEvento;
	}
	$opcao = "";
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
			echo 'Operação selecionada: Entrada';
			if(isset($opcaoEvento)){
				echo ' / Evento: ' . $eventosLista[$opcaoEvento][0];
			} else {
				echo ' / Evento não selecionado';
			}
		} else if($_POST['opcoes'] == 2){
			echo 'Operação selecionada: Saida';
			if(isset($opcaoEvento)){
				echo ' / Evento: ' . $eventosLista[$opcaoEvento][0];
			} else {
				echo ' / Evento não selecionado';
			}
		} else {
			echo 'valor de opcao incorreta';
		}
	}

	echo '<br>';

	?>

	<?php 
	
	if(isset($opcaoEvento)){
	$opEvento = $eventosLista[$opcaoEvento][0];
	$sql = "SELECT nome FROM eventos WHERE evento = '$opEvento'";
	$stmt = $connectar->query($sql);
	$stmt->execute();
	$nomeEventos = $stmt->fetchAll();
	}
	?>

	<div class="bg">
		<?php if(isset($opcaoEvento)){ ?>
	<?php foreach($nomeEventos as $nomeEvento) { ?>
		<form method="post" action="<?=$opcao?>">
		<div class="nomes"><?php echo $nomeEvento[0]; //input para inserir as quantidades para dar baixa ?></div>
		<div class="inputs"><input type="number" id="<?=$nomeEvento[0]?>" name="<?=$nomeEvento[0]?>"></div>

	<?php
		} 		
	}
	?>

		<input type="submit" name="enviar" value="Baixa">
		</form>
		</div>

	<a href="criarEvento.php">
		<div class="opcoes">
			<h1>Novo Evento</h1>
		</div>
	</a>
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
		<a href="infoItens.php">
		<div class="opcoes">
			<h1>Informações de itens</h1>
		</div>
	</a>
	</a>
		<a href="doacoes.php">
		<div class="opcoes">
			<h1>Doações</h1>
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
