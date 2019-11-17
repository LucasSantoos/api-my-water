<?php
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cidades</title>
	</head>
	<body>
		<?php
			$id = $_POST['id'];
			$descricao = $_POST['descricao'];
			$id_estado = $_POST['id_estado'];

			$sql = "UPDATE cidades SET descricao = '$descricao', id_estado = $id_estado WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: listar_cidades.php');
			} else {
				echo "Não foi possível alterar a cidade! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>