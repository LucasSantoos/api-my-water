<?php
	include('../validar.php');
	include('../conexao.php');
	$id = $_GET['id'];

	$sql = "SELECT * FROM pessoas WHERE id = $id";
	$query = mysqli_query($con, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Pessoas</title>
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

		<form action="alterar_pessoas_db.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $item['ID']; ?>">
			Código: <?php echo $item['ID']; ?><br><br>
			
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="100" value="<?php echo $item['NOME']; ?>"><br><br>
			
			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="14" value="<?php echo $item['CPF']; ?>"><br><br>
			
			<label for="dt_nasc">Data de nascimento</label><br>
			<input type="date" name="dt_nasc" id="dt_nasc" value="<?php echo $item['DT_NASC']; ?>"><br><br>

			<label for="tipo_pessoa">Tipo de pessoa</label><br>
			<select id="tipo_pessoa" name="tipo_pessoa">
				<option value="fisica" <?=($item['TIPO_PESSOA'] == 'fisica')?'selected':''?> >Física</option>
				<option value="juridica" <?=($item['TIPO_PESSOA'] == 'juridica')?'selected':''?> >Juridica</option>
			</select>

			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>
<?php
	mysqli_close($con);
?>