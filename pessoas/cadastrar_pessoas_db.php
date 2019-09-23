<?php
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Pessoas</title>
	</head>
	<body>
		<?php
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$dt_nasc = $_POST['dt_nasc'];
			$tipo_pessoa = $_POST['tipo_pessoa'];

			$sql = "INSERT INTO pessoas VALUES (null, '$nome', '$cpf', '$dt_nasc', '$tipo_pessoa')";
			
			$query = mysqli_query($con, $sql);
			if($query) {
				$codigo = mysqli_insert_id($con);
				$qtd = mysqli_affected_rows($con);
				echo "Pessoa cadastrada com sucesso! Código: $codigo Itens modificados: $qtd";
			} else {
				echo "Não foi possível cadastrar a pessoa! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>