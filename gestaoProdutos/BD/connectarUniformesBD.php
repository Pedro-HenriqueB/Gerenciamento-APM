<?php 

require_once("connectarBD.php");
$sql = "CREATE DATABASE IF NOT EXISTS gestaoProdutos";

$resultado = $connectar->query($sql);

if($resultado) {
	echo '<br>Sucesso criar Banco de dados gestao!';
} else {
	echo '<br>Erro ao cria Banco: ' . $connectar->error();
}

$sql = "CREATE TABLE IF NOT EXISTS uniformes (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	precoMIN DECIMAL(6,2) NOT NULL,
	precoMAX DECIMAL(6,2) NOT NULL,
	valor DECIMAL(6,2) NOT NULL,
	quantidade INT
)";

$resultado = $connectar->query($sql);

if($resultado) {
	echo '<br>Sucesso criar tabela gestao!';
} else {
	echo '<br>Erro criar tabela gestao: ' . $connectar->error;
}


 ?>
