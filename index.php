<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Faculdades ESUCRI</title>
	</head>
	<body>
		<?php
			if(@$_GET['erro'] == 1) {
				echo 'Usuário ou senha inválida!';
			}
		?>
		<form action="login_db.php" method="post">
			<label for="login">Login</label><br>
			<input type="text" name="login" id="login" maxlength="20"><br><br>
			
			<label for="senha">Senha</label><br>
			<input type="password" name="senha" id="senha" maxlength="20"><br><br>
			
			<input type="submit" name="entrar"value="Entrar">
		</form>
	</body>
</html>