<?php
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Paises</title>
	</head>
	<body>
		<?php
			$id = $_POST['id'];
			$descricao = $_POST['descricao'];

			$sql = "UPDATE paises SET descricao = '$descricao' WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: listar_paises.php');
			} else {
				echo "Não foi possível alterar o pais! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>