<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloContribuintesAPM.css">
	<meta charset="utf-8">
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
	setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");

	 if(isset($_POST['nome']) && isset($_POST['aluno']) && isset($_POST['rg']) && isset($_POST['cpf']) && isset($_POST['rua']) &&
	  isset($_POST['numero']) && isset($_POST['bairro']) && isset($_POST['armario']) && isset($_POST['valor']) && $_POST['nome'] != null){
	 	$nome = $_POST['nome'];
	 	$aluno = $_POST['aluno'];
	 	$rg = $_POST['rg'];
	 	$cpf = $_POST['cpf'];
	 	$rua = $_POST['rua'];
	 	$numero = $_POST['numero'];
	 	$bairro = $_POST['bairro'];
	 	$armario = $_POST['armario'];
	 	$valor = $_POST['valor'];

	 ; ?>
	 <!--///////////////////////////////////////////Contrato e Clausulas//////////////////////////////////////////////////////////////// -->
		<p>TERMO DE LOCAÇÃO DE ARMÁRIO – nº <?php echo $armario; ?>/2021<br>

Eu, <?php echo $nome; ?>, portador do RG <?php echo $rg; ?> e CPF <?php echo $cpf; ?> e domiciliado à Rua: <?php echo $rua; ?> nº <?php echo $numero; ?> Bairro: 
<?php  echo $bairro; ?> responsável pelo(a) aluno(a) <?php echo $aluno; ?> regularmente matriculado no curso Ensino Médio Regular solicito a locação de um armário.<br>

O presente contrato de locação do armário, se regerá pelas cláusulas seguintes e pelas condições descritas no presente.<br>
1-	DO OBJETO DO CONTRATO<br>
Cláusula 1ª. O presente tem como objeto a locação do armário de nº <?php echo $armario; ?>, localizado no 1º andar da ETEC João Maria Stevanatto.<br>
2-	DA UTILIZAÇÃO DO ARMÁRIO<br>
Cláusula 2ª. A locação destina-se ao uso do armário para guarda de materiais escolares tais como cadernos, livros, jalecos, óculos de proteção, entre outros.<br>
§1º É vedada a utilização do armário para guardar materiais ilícitos, bens perecíveis, produtos químicos, explosivos e materiais de expressivo valor econômico, sob pena de arrombamento do armário e remoção e entrega de tais objetos às autoridades competentes.<br>
3-	DO ACESSO<br>
Cláusula 3ª. Somente terá acesso ao referido armário o titular da locação, assim como o aluno devidamente citado acima, os quais se sujeitam expressamente a todas as normas e regulamentos internos.<br>
4-	DA RESPONSABILIDADE<br>
Cláusula 4ª. O acesso ao armário somente é permitido ao LOCATÁRIO ou o referido aluno, de forma restrita, passando este a ter responsabilidade exclusiva por aquilo que for guardado no interior do armário a partir da entrega das chaves.<br>
§1º Após a entrega das chaves, é vedada a presença ou manuseio dos armários pelo LOCADOR, salvos os casos de extrema urgência, aos quais deverá contar com a presença do locatário E/OU nos casos em que for necessário o arrombamento do armário por infração ao disposto no §1º da cláusula 2 deste contrato.<br>
§2º Após a entrega das chaves, o LOCADOR, por não ter mais acesso ao armário, não se responsabiliza por riscos ou quaisquer ocorrências no mesmo, como desaparecimento de objetos ou outros pertences.<br>
§3º No caso de o armário possuir o fechamento por cadeado, o LOCATÁRIO obrigatoriamente deverá ceder uma cópia da chave para o LOCADOR. No final do contrato, o LOCATÁRIO deverá deixar o armário de sua responsabilidade aberto (sem cadeado).<br>

5-	DO VALOR DA LOCAÇÃO<br>
Cláusula 5ª. O LOCATÁRIO deverá pagar um valor de: <?php echo 'R$' . $valor; ?><br>

6-	CONDIÇÕES GERAIS<br>
Cláusula 6ª. A utilização do armário estará vinculada ao prazo estipulado no calendário letivo para o fim das aulas na Instituição, quando efetuado o pagamento anual ou ao fim do primeiro semestre letivo, quando efetuado o pagamento semestral.<br>
§1º O presente contrato finalizará ao final do 1º semestre letivo (JULHO) para aqueles que pagarem apenas 1 parcela de R$35,00. (Técnico Noturno)<br>

Cláusula 7ª. O presente contrato passa vigorar entre as partes a partir da data de assinatura.<br><br>

<div class="rodape">
Itapira,<?php  echo ' '.date('d').' '; ?>de <?php echo ucwords(strftime("%B")); ?> de <?php  echo ' '.date('Y').' '; ?>.<br><br>

Ass. LOCATÁRIO ____________________  <br><br><br>  Ass.  LOCADOR _____________________<br><br><br>

PROTOCOLO DE LOCAÇÃO DE ARMÁRIO – nº <?php echo $armario; ?>/<?php  echo ' '.date('Y').' '; ?>
<br><br><br>

DATA: _____/<?php echo ucwords(strftime("%m")); ?>/<?php  echo ' '.date('Y').' '; ?><br><br>
Ass. LOCADOR _____________________
</p>
</div>
<?php 
} else {
	 echo '<br>Campos preenchidos incorretamente!';
}
 ?>
</body>
</html>