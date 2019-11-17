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
			$descricao = $_POST['descricao'];

			$sql = "INSERT INTO paises VALUES (null, '$descricao')";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				header('Location: listar_paises.php');
			} else {
				echo "Não foi possível cadastrar o pais! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>