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

			var_dump($query);
			if($query) {
				$codigo = mysqli_insert_id($con);
				$qtd = mysqli_affected_rows($con);
				echo "Estadp cadastrado com sucesso! Código: $codigo Itens modificados: $qtd";
			} else {
				echo "Não foi possível cadastrar o estado! Erro: " . mysqli_error($con);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($con);
?>