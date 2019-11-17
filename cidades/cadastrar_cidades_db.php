<?php
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Estados</title>
	</head>
	<body>
		<?php
			$descricao = $_POST['descricao'];
			$id_estado = $_POST['id_estado'];

			$sql = "INSERT INTO cidades (descricao, id_estado) VALUES ('$descricao', $id_estado)";
			
			$query = mysqli_query($con, $sql);

			if($query) {
				header('Location: listar_cidades.php');
			} else {
				echo "Não foi possível cadastrar a cidade! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>