<?php
	include('../validar.php');
	include('../conexao.php');
	$id = $_GET['id'];

	$sql = "SELECT * FROM cidades WHERE id = $id";
	$query = mysqli_query($con, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);

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

		<form action="alterar_cidades_db.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $item['ID']; ?>">
			Código: <?php echo $item['ID']; ?><br><br>
			
			<label for="descricao">Descrição</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100" value="<?php echo $item['DESCRICAO']; ?>"><br><br>

			<label for="id_estado">Estado</label><br>
			<select name="id_estado" id="id_estado">
				<?php
					$sql = "SELECT id as estado_id, descricao as estado_descricao FROM estados";
					$query = mysqli_query($con, $sql);
					while ($item_estado = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item_estado['estado_id']; ?>" 
				<?=($item['ID_ESTADO'] == $item_estado['estado_id']) ? 'selected':''?> >
				<?php echo $item_estado['estado_descricao']; ?></option>
				<?php
					}
				?>
			</select><br><br>

			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>
<?php
	mysqli_close($con);
?>