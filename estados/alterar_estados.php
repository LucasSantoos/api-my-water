<?php
	include('../validar.php');
	include('../conexao.php');
	$id = $_GET['id'];

	$sql = "SELECT * FROM estados WHERE id = $id";
	$query = mysqli_query($con, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Estados</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
		<form action="alterar_estados_db.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $item['ID']; ?>">
			Código: <?php echo $item['ID']; ?><br><br>
			
			<label for="descricao">Descrição</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100" value="<?php echo $item['DESCRICAO']; ?>"><br><br>

			<label for="id_pais">Pais</label><br>
			<select name="id_pais" id="id_pais">
				<?php
					$sql = "SELECT id as pais_id, descricao as pais_descricao FROM paises";
					$query = mysqli_query($con, $sql);
					while ($item_pais = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item_pais['pais_id']; ?>" 
				<?=($item['ID_PAIS'] == $item_pais['pais_id']) ? 'selected':''?> >
				<?php echo $item_pais['pais_descricao']; ?></option>
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