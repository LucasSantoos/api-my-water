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
			$id = $_POST['id'];
			$numero = $_POST['numero'];
			$bairro = $_POST['bairro'];
			$descricao = $_POST['descricao'];
			$id_pessoa = $_POST['id_pessoa'];
			$id_cidade = $_POST['id_cidade'];

			$sql = "UPDATE pessoas_enderecos 
			SET numero = '$numero',	bairro = '$bairro', descricao = '$descricao', 
			id_pessoa = $id_pessoa, id_cidade = $id_cidade WHERE id = $id";
						
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Endereço alterada com sucesso!";
			} else {
				echo "Não foi possível alterar a endereço! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>