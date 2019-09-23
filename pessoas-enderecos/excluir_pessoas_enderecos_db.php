<?php
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Endereços</title>
	</head>
	<body>
		<?php
			$id = $_GET['id'];
			
			$sql = "DELETE FROM pessoas_enderecos WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Endereço excluído com sucesso!";
			} else {
				echo "Não foi possível excluir o endereço! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>