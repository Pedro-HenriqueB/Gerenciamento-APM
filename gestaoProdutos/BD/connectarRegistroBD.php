nome<?php 
require_once("connectarBD.php");

$sql = "CREATE TABLE IF NOT EXISTS registroUniformes(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	quantidade INT(6),
	valor DECIMAL(6,2) NOT NULL,
	tipoPagamento VARCHAR(100) NOT NULL,
	data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$resultado = $connectar->query($sql);

if($resultado) {
	echo "<br>Sucesso criar tabela registroUniformes!";
} else {
	echo "<br>Erro criar tabela registro: " . $connectar->error;
}


 ?>
