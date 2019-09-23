<?php
	include('../validar.php');
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Estados</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
				<br><br>

		<form action="cadastrar_estados_db.php" method="POST">
			<label for="descricao">Descrição</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100"><br><br>

			<label for="id_pais">Pais</label><br>
			<select name="id_pais" id="id_pais">
				<?php
					$sql = "SELECT id as pais_id, descricao as pais_descricao FROM paises";
					$query = mysqli_query($con, $sql);
					while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item['pais_id']; ?>"><?php echo $item['pais_descricao']; ?></option>
				<?php
					}
				?>
			</select><br><br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>