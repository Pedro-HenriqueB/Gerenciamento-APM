<?php 
require_once("connectarBD.php");

$sql = "CREATE TABLE IF NOT EXISTS registroServicos(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	servico VARCHAR(100),
	valor DECIMAL(6,2),
	data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$resultado = $connectar->query($sql);

if($resultado) {
	echo "<br>Sucesso criar tabela registroServiços!";
} else {
	echo "<br>Erro criar tabela registro: " . $connectar->error;
}

//Não necessário até então!
 ?>
