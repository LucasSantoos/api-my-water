<?php
	include('validar.php');
	include('conexao.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM cliente WHERE id = $id";
	$query = mysqli_query($con, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Faculdades ESUCRI</title>
	</head>
	<body>
		<?php
			include('menu.php');
		?>
		Usuário:
		<?php
			echo $_SESSION['usuario']['login'];
		?>
		<form action="alterar_clientes_db.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $item['id']; ?>">
			Código: <?php echo $item['id']; ?><br><br>
			
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="100" value="<?php echo $item['nome']; ?>"><br><br>
			
			<label for="endereco">Endereço</label><br>
			<input type="text" name="endereco" id="endereco" maxlength="255" value="<?php echo $item['endereco']; ?>"><br><br>
			
			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="14" value="<?php echo $item['telefone']; ?>"><br><br>
			
			<label for="celular">Celular</label><br>
			<input type="text" name="celular" id="celular" maxlength="14" value="<?php echo $item['celular']; ?>"><br><br>
			
			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="14" value="<?php echo $item['cpf']; ?>"><br><br>
			
			<input type="submit" name="enviar" value="Enviar">
		</form>
	</body>
</html>
<?php
	mysqli_close($con);
?>