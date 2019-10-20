<?php
	include('../validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Pessoas</title>
	</head>
		<body>
		<?php
			include('../menu.php');
		?>
		<br><br>
		Usuário:
		<?php
			echo $_SESSION['usuario']['LOGIN'];
		?>
		<br><br>

		<form action="cadastrar_pessoas_db.php" method="POST" enctype="multipart/form-data">
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="100"><br><br>
			
			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="14"><br><br>
			
			<label for="dt_nasc">Data de nascimento</label><br>
			<input type="date" name="dt_nasc" id="dt_nasc"><br><br>

			<label for="tipo_pessoa">Tipo de pessoa</label><br>
			<select id="tipo_pessoa" name="tipo_pessoa">
				<option value="" >Selecione um tipo</option>
				<option value="fisica">Física</option>
				<option value="juridica">Juridica</option>
			</select>

			<br>
			<label for="foto-perfil">Foto de perfil</label>
			<br>
			<input id="foto-perfil" type="file" name="arquivo">
			<br>
			
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>