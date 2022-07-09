<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estiloContribuintesAPM.css">
	<meta charset="utf-8">
	<title>Gerenciamento APM</title>
</head>
<body>
	<div class="bg">
	<form method="post" action="baixaContribuintesAPM.php">
		<div class="nomes"><label for="nome">Nome:</label></div>
		<div class="inputs"><input type="text" id="nome" name="nome"></div>
		<div class="nomes"><label for="valor">Valor:</label></div>
		<div class="inputs"><input type="float" name="valor"></div>
		<select id="periodo" name="periodo">
			<div class="nomes"><label for="periodo">Selecione o periodo:</label></div>
			<option value="Manhã">Manhã</option>
			<option value="Tarde">Tarde</option>
			<option value="Noite">Noite</option>
		</select>
		<select id="situacao" name="situacao">
			<div class="nomes"><label for="periodo">Selecione o periodo:</label></div>
			<option value="Ativo">Ativo</option>
			<option value="Inativo">Inativo</option>
		</select>
		<input type="submit" value="Adicionar">
	</form>
	</div>
<a href="contribuintesAPM.php">
	<div class="opcoes">
		<h1>Voltar</h1>
	</div>
</a>

</body>
</html>
