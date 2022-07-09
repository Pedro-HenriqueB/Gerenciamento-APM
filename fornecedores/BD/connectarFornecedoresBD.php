<?php 

require_once("connectarBD.php");
$sql = "CREATE DATABASE IF NOT EXISTS gestaoProdutos";

$resultado = $connectar->query($sql);

if($resultado) {
	echo '<br>Sucesso criar Banco de dados gestao!';
} else {
	echo '<br>Erro ao cria Banco: ' . $connectar->error();
}

$sql = "CREATE TABLE IF NOT EXISTS fornecedores (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	produto VARCHAR(100) NOT NULL,
	precoMIN DECIMAL(6,2) NOT NULL,
	precoMAX DECIMAL(6,2) NOT NULL,
	valorCompra DECIMAL(6,2),
	quantidade INT,
	notaFiscal VARCHAR(100) NOT NULL,
	dataPagamento DATE,
	dataRecebimento DATE
)";

$resultado = $connectar->query($sql);

if($resultado) {
	echo '<br>Sucesso criar tabela Fornecedores!';
} else {
	echo '<br>Erro criar tabela gestao: ' . $connectar->error;
}


 ?>
