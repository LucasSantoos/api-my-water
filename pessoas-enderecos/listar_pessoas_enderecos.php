<?php
	include('../validar.php');
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Endereços</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
		<br><br><a class="btn-cadastrar" href="cadastrar_pessoas_enderecos.php">Cadastrar</a>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Código pessoa</th>
					<th>Nome</th>
					<th>Código cidade</th>
					<th>Cidade</th>
					<th>Bairro</th>
					<th>Número</th>
					<th>Observações</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$sql = 'SELECT pe.id, pe.numero, pe.descricao, pe.bairro, pe.id_pessoa, p.nome,  
						pe.id_cidade, c.descricao as nome_cidade
					FROM pessoas_enderecos pe 
					INNER JOIN pessoas p ON pe.id_pessoa = p.id
					INNER JOIN cidades c ON pe.id_cidade = c.id';
			$query = mysqli_query($con, $sql);

			if (!$query) {
				echo 'Erro: ' . mysqli_error($con);
			}
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {		
		?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['id_pessoa']; ?></td>
					<td><?php echo $item['nome']; ?></td>
					<td><?php echo $item['id_cidade']; ?></td>
					<td><?php echo $item['nome_cidade']; ?></td>
					<td><?php echo $item['bairro']; ?></td>
					<td><?php echo $item['numero']; ?></td>
					<td><?php echo $item['descricao']; ?></td>
					<td><a class="btn-alterar" href="alterar_pessoas_enderecos.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
					<td><a class="btn-excluir" href="excluir_pessoas_enderecos_db.php?id=<?php echo $item['id']; ?>">Excluir</a></td>
				</tr>
		<?php
			}
		?>
			</tbody>
		</table>
		Existe(m) <?php echo mysqli_num_rows($query); ?> Registro(s)
	</body>
</html>
<?php
	mysqli_close($con);
?>