<?php
	include('../validar.php');
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Telefones</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
		<br><br><a href="cadastrar_pessoas_telefones.php">Cadastrar</a>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Número</th>
					<th>Observações</th>
					<th>Código pessoa</th>
					<th>Nome</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$sql = 'SELECT pt.id, pt.nro_telefone, pt.descricao, pt.id_pessoa, p.nome  
					FROM pessoas_telefones pt 
					INNER JOIN pessoas p ON pt.id_pessoa = p.id';
			$query = mysqli_query($con, $sql);

			if (!$query) {
				echo 'Erro: ' . mysqli_error($con);
			}
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {		
		?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['nro_telefone']; ?></td>
					<td><?php echo $item['descricao']; ?></td>
					<td><?php echo $item['id_pessoa']; ?></td>
					<td><?php echo $item['nome']; ?></td>
					<td><a href="alterar_pessoas_telefones.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
					<td><a href="excluir_pessoas_telefones_db.php?id=<?php echo $item['id']; ?>">Excluir</a></td>
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