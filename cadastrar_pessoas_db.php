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
			$nome     = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$celular  = $_POST['celular'];
			$cpf      = $_POST['cpf'];
			
			$sql = "INSERT INTO cliente VALUES (null, '$nome', '$endereco', '$telefone', '$celular', '$cpf')";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				$codigo = mysqli_insert_id($con);
				$qtd = mysqli_affected_rows($con);
				echo "Cliente cadastrado com sucesso! Código: $codigo Itens modificados: $qtd";
			} else {
				echo "Não foi possível cadastrar o cliente! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>