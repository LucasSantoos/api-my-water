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
			$descricao = $_POST['descricao'];
			$id_pais = $_POST['id_pais'];

			$sql = "INSERT INTO estados (descricao, id_pais) VALUES ('$descricao', $id_pais)";
			
			$query = mysqli_query($con, $sql);

			if($query) {
				header('Location: listar_estados.php');
			} else {
				echo "Não foi possível cadastrar o estado! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>