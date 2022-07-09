<?php 

require_once("connectarBD.php");
$sql = "CREATE DATABASE IF NOT EXISTS gestaoProdutos";

$resultado = $connectar->query($sql);

if($resultado) {
	echo '<br>Sucesso criar Banco de dados gestao!';
} else {
	echo '<br>Erro ao cria Banco: ' . $connectar->error();
}

$sql = "CREATE TABLE IF NOT EXISTS armarios(
	nome VARCHAR(100) NOT NULL,
	numero INT(6) NOT NULL PRIMARY KEY,
	situacao VARCHAR(100) NOT NULL
	)";

$resultado = $connectar->query($sql);

if($resultado) {
	echo '<br>Sucesso criar tabela armarios!';
} else {
	echo '<br>Erro criar tabela gestao: ' . $connectar->error();
}


 ?>
