<?php
	include('../validar.php');
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Cidades</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
				<br><br>

		<form action="cadastrar_cidades_db.php" method="POST">
			<label for="descricao">Descrição</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100"><br><br>

			<label for="id_estado">Estado</label><br>
			<select name="id_estado" id="id_estado">
				<?php
					$sql = "SELECT id as estado_id, descricao as estado_descricao FROM estados";
					$query = mysqli_query($con, $sql);
					while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item['estado_id']; ?>"><?php echo $item['estado_descricao']; ?></option>
				<?php
					}
				?>
			</select><br><br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>