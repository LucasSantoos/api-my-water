<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Faculdades ESUCRI</title>
	</head>
	<body>
		<?php
			$id = $_GET['id'];
			
			$sql = "DELETE FROM cliente WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Cliente excluído com sucesso!";
			} else {
				echo "Não foi possível excluir o cliente! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>