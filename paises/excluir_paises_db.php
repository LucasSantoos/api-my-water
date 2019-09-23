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
			$id = $_GET['id'];
			
			$sql = "DELETE FROM paises WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Pais excluído com sucesso!";
			} else {
				echo "Não foi possível excluir o pais! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>