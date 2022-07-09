<?php 

require_once("connectarBD.php");
$sql = "CREATE DATABASE IF NOT EXISTS gestaoProdutos";

$resultado = $connectar->query($sql);

if($resultado) {
	echo '<br>Sucesso criar Banco de dados gestao!';
} else {
	echo '<br>Erro ao cria Banco: ' . $connectar->error();
}

$sql = "CREATE TABLE IF NOT EXISTS contribuintes (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		nome VARCHAR(100) NOT NULL,
		situacao VARCHAR(100),
		valor DECIMAL(6,2),
		periodo VARCHAR(100),
		data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	)";

	$resultado = $connectar->query($sql);
	if($resultado) {
		echo '<br>Tabela contribuintes criada com sucesso!';
	} else {
		echo 'Erro ao criar tabela!';
	}

	$sql = "CREATE TABLE IF NOT EXISTS contratos(
			nome VARCHAR(100),
			aluno VARCHAR(100),
			rg VARCHAR(100),
			cpf VARCHAR(100),
			rua VARCHAR(100),
			numero VARCHAR(100),
			bairro VARCHAR(100),
			valor DECIMAL(6,2),
			armario INT
	)";

	$resultado = $connectar->query($sql);
	if($resultado) {
		echo '<br>Tabela contratos criada com sucesso!';
	} else {
		echo '<br>Erro ao criar tabela!';
	}

	$sql = "CREATE TABLE IF NOT EXISTS clausulas(
			clausula VARCHAR(5000)
	)";

	$resultado = $connectar->query($sql);
	if($resultado) {
		echo '<br>Tabela clausulas criada com sucesso!';
	} else {
		echo '<br>Erro ao criar tabela!';
	}

 ?>
