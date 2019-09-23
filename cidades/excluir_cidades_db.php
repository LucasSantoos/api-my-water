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
			$id = $_GET['id'];
			
			$sql = "DELETE FROM cidades WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Cidade excluído com sucesso!";
			} else {
				echo "Não foi possível excluir o cidade! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>