<?php
	include('../validar.php');
	include('../conexao.php');
	$id = $_GET['id'];

	$sql = "SELECT * FROM pessoas_enderecos WHERE id = $id";
	$query = mysqli_query($con, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Endereços</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
				<br><br>

		<form action="alterar_pessoas_enderecos_db.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $item['ID']; ?>">
			Código: <?php echo $item['ID']; ?><br><br>
			
			<label for="numero">Número</label><br>
			<input type="text" name="numero" id="numero" maxlength="100" value="<?php echo $item['NUMERO']; ?>"><br><br>

			<label for="descricao">Observações</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100" value="<?php echo $item['DESCRICAO']; ?>"><br><br>

			<label for="bairro">Bairro</label><br>
			<input type="text" name="bairro" id="bairro" maxlength="100" value="<?php echo $item['BAIRRO']; ?>"><br><br>

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

			<label for="id_cidade">Cidade</label><br>
			<select name="id_cidade" id="id_cidade">
				<?php
					$sql = "SELECT id, descricao FROM cidades";
					$query = mysqli_query($con, $sql);
					while ($item_cidade = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item_cidade['id']; ?>" 
				<?=($item['ID_CIDADE'] == $item_cidade['id']) ? 'selected':''?> >
				<?php echo $item_cidade['descricao']; ?></option>
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