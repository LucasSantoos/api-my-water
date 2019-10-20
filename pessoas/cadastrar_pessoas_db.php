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


			if(isset($_FILES['arquivo'])){
				$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
				$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
				$diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
				move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
				$sql = "INSERT INTO pessoas (nome, cpf, dt_nasc, tipo_pessoa, imagem) 
				VALUES ('$nome', '$cpf', '$dt_nasc', '$tipo_pessoa', '$novo_nome')";
			} else {
				$sql = "INSERT INTO pessoas (nome, cpf, dt_nasc, tipo_pessoa) 
				VALUES ('$nome', '$cpf', '$dt_nasc', '$tipo_pessoa')";	
			}
			
			var_dump($sql);

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