<?php
	include('../validar.php');
	include('../conexao.php');
	$id = $_GET['id'];

	$sql = "SELECT * FROM paises WHERE id = $id";
	$query = mysqli_query($con, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Paises</title>
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

		<form action="alterar_paises_db.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $item['ID']; ?>">
			Código: <?php echo $item['ID']; ?><br><br>
			
			<label for="descricao">Descrição</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100" value="<?php echo $item['DESCRICAO']; ?>"><br><br>
		
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>
<?php
	mysqli_close($con);
?>