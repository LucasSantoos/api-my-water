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
			$id = $_GET['id'];
			
			$sql = "DELETE FROM pessoas WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Pessoa excluída com sucesso!";
			} else {
				echo "Não foi possível excluir a pessoa! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>