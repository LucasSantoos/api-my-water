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
			$nro_telefone = $_POST['nro_telefone'];
			$descricao = $_POST['descricao'];
			$id_pessoa = $_POST['id_pessoa'];

			$sql = "INSERT INTO pessoas_telefones (nro_telefone, descricao, id_pessoa) VALUES ('$nro_telefone', 
					'$descricao', $id_pessoa)";
			
			$query = mysqli_query($con, $sql);

			if($query) {
				$codigo = mysqli_insert_id($con);
				$qtd = mysqli_affected_rows($con);
				echo "Cidade cadastrada com sucesso! Código: $codigo Itens modificados: $qtd";
			} else {
				echo "Não foi possível cadastrar a telefone! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>