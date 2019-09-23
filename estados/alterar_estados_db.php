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
			$id = $_POST['id'];
			$descricao = $_POST['descricao'];
			$id_pais = $_POST['id_pais'];

			$sql = "UPDATE estados SET descricao = '$descricao', id_pais = $id_pais WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Estado alterado com sucesso!";
			} else {
				echo "Não foi possível alterar o estado! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>