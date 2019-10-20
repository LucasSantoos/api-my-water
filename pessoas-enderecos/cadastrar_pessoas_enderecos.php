<?php
	include('../validar.php');
	include('../conexao.php');
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
		Usuário:
		<?php
			echo $_SESSION['usuario']['LOGIN'];
		?>
		<br><br>
				<br><br>

		<form action="cadastrar_pessoas_enderecos_db.php" method="POST">
			
			<label for="numero">Número</label><br>
			<input type="text" name="numero" id="numero" maxlength="11"><br><br>

			<label for="descricao">Observações</label><br>
			<input type="text" name="descricao" id="descricao" maxlength="100"><br><br>

			<label for="bairro">Bairro</label><br>
			<input type="text" name="bairro" id="bairro" maxlength="100"><br><br>

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

			<label for="id_cidade">Cidade</label><br>
			<select name="id_cidade" id="id_cidade">
				<?php
					$sql = "SELECT id, descricao FROM cidades";
					$query = mysqli_query($con, $sql);
					while ($item_cidade = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item_cidade['id']; ?>"><?php echo $item_cidade['descricao']; ?></option>
				<?php
					}
				?>
			</select><br><br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>