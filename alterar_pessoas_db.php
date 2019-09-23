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
			$id       = $_POST['id'];
			$nome     = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$celular  = $_POST['celular'];
			$cpf      = $_POST['cpf'];
			
			$sql = "UPDATE cliente SET nome = '$nome', endereco = '$endereco', telefone = '$telefone', celular = '$celular', cpf = '$cpf' WHERE id = $id";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				echo "Cliente + com sucesso!";
			} else {
				echo "Não foi possível alterar o cliente! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>