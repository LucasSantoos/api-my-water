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
			$id = $_POST['id'];
			$nro_telefone = $_POST['nro_telefone'];
			$descricao = $_POST['descricao'];
			$id_pessoa = $_POST['id_pessoa'];

			$sql = "UPDATE pessoas_telefones SET nro_telefone = '$nro_telefone', 
					descricao = '$descricao', id_pessoa = $id_pessoa WHERE id = $id";
						
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Telefone alterada com sucesso!";
			} else {
				echo "Não foi possível alterar a telefone! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>