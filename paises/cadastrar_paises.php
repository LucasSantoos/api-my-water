<?php
	include('../validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Pais</title>
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
				<br><br>

		<form action="cadastrar_paises_db.php" method="POST">
			<label for="descricao">Descrição</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100"><br><br>

			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>