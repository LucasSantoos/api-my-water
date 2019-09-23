<?php
	include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Faculdades ESUCRI</title>
	</head>
	<body>
		<?php
			include('menu.php');
		?>
		Usuário:
		<?php
			echo $_SESSION['usuario']['login'];
		?>
		<form action="cadastrar_clientes_db.php" method="POST">
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="100"><br><br>
			
			<label for="endereco">Endereço</label><br>
			<input type="text" name="endereco" id="endereco" maxlength="255"><br><br>
			
			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="14"><br><br>
			
			<label for="celular">Celular</label><br>
			<input type="text" name="celular" id="celular" maxlength="14"><br><br>
			
			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="14"><br><br>
			
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>