<?php
	include('../validar.php');
	include('../conexao.php');
	$id = $_GET['id'];

	$sql = "SELECT * FROM pessoas_telefones WHERE id = $id";
	$query = mysqli_query($con, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Telefones</title>
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

		<form action="alterar_pessoas_telefones_db.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $item['ID']; ?>">
			Código: <?php echo $item['ID']; ?><br><br>
			
			
			<label for="descricao">Descrição</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100" value="<?php echo $item['DESCRICAO']; ?>"><br><br>

			<label for="nro_telefone">Número</label><br>
			<input type="text" name="nro_telefone" id="nro_telefone" maxlength="100" value="<?php echo $item['NRO_TELEFONE']; ?>"><br><br>

			<label for="id_pessoa">Pessoa</label><br>
			<select name="id_pessoa" id="id_pessoa">
				<?php
					$sql = "SELECT id as pessoa_id, nome FROM pessoas";
					$query = mysqli_query($con, $sql);
					while ($item_pessoa = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item_pessoa['pessoa_id']; ?>" 
				<?=($item['ID_PESSOA'] == $item_pessoa['pessoa_id']) ? 'selected':''?> >
				<?php echo $item_pessoa['nome']; ?></option>
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