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
			$id = $_GET['id'];
			
			$sql = "DELETE FROM estados WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Estado excluído com sucesso!";
			} else {
				echo "Não foi possível excluir o estado! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>