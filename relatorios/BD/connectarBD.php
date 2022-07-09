<?php 

$servidor = '127.0.0.1:3306';
$usuario = 'root';
$senha = "";

try {
	$connectar = new PDO("mysql:host=$servidor; dbname=gestaoProdutos",
	$usuario, $senha);
	$connectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Banco de Dados connectado!";
	}

catch(PDOException $e) {
	echo "Conexao falhou: " .$e->getMessage();
	}
?>