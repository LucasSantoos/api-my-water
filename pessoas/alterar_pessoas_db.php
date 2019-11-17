<?php
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Pessoas</title>
	</head>
	<body>
		<?php
			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$dt_nasc = $_POST['dt_nasc'];
			$tipo_pessoa = $_POST['tipo_pessoa'];

			$sql = "UPDATE pessoas SET nome = '$nome', cpf = '$cpf', dt_nasc = '$dt_nasc', tipo_pessoa = '$tipo_pessoa' WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: listar_pessoas.php');
			} else {
				echo "Não foi possível alterar a pessoa! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>