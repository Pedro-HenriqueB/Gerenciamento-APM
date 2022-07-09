<?php 
require_once("connectarBD.php");

$sql = "CREATE TABLE IF NOT EXISTS registroFornecedores(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	quantidade INT(6),
	valorVenda DECIMAL(6,2),
	valorCompra DECIMAL(6,2),
	data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$resultado = $connectar->query($sql);

if($resultado) {
	echo "<br>Sucesso criar tabela registroFornecedores!";
} else {
	echo "<br>Erro criar tabela registro: " . $connectar->error;
}

//Não necessário até então!
 ?>
