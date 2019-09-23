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
			$numero = $_POST['numero'];
			$bairro = $_POST['bairro'];
			$descricao = $_POST['descricao'];
			$id_pessoa = $_POST['id_pessoa'];
			$id_cidade = $_POST['id_cidade'];

			$sql = "INSERT INTO pessoas_enderecos (numero, descricao, bairro, id_pessoa, id_cidade) 
			VALUES ('$numero', '$descricao', '$bairro', $id_pessoa, $id_cidade)";
		
			$query = mysqli_query($con, $sql);

			if($query) {
				$codigo = mysqli_insert_id($con);
				$qtd = mysqli_affected_rows($con);
				echo "Endereço cadastrada com sucesso! Código: $codigo Itens modificados: $qtd";
			} else {
				echo "Não foi possível cadastrar a endereço! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>