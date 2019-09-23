<?php
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Telefones</title>
	</head>
	<body>
		<?php
			$id = $_GET['id'];
			
			$sql = "DELETE FROM pessoas_telefones WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Telefone excluído com sucesso!";
			} else {
				echo "Não foi possível excluir o telefone! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>