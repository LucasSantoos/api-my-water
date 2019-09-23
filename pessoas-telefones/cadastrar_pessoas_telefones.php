<?php
	include('../validar.php');
	include('../conexao.php');
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
		<form action="cadastrar_pessoas_telefones_db.php" method="POST">
			
			<label for="nro_telefone">Número</label><br>
			<input type="text" name="nro_telefone" id="nro_telefone" maxlength="11"><br><br>

			<label for="descricao">Observações</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100"><br><br>

			<label for="id_pessoa">Pessoa</label><br>
			<select name="id_pessoa" id="id_pessoa">
				<?php
					$sql = "SELECT id as pessoa_id, nome FROM pessoas";
					$query = mysqli_query($con, $sql);
					while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item['pessoa_id']; ?>"><?php echo $item['nome']; ?></option>
				<?php
					}
				?>
			</select><br><br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>