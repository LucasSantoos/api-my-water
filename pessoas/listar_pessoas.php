<?php
	include('../validar.php');
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Pessoas</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
		<br><br><a href="cadastrar_pessoas.php">Cadastrar</a>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>Data de nascimento</th>
					<th>Tipo</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$sql = 'SELECT id, nome, cpf, dt_nasc, tipo_pessoa FROM pessoas';
			$query = mysqli_query($con, $sql);
			if (!$query) {
				echo 'Erro: ' . mysqli_error($con);
			}
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['nome']; ?></td>
					<td><?php echo $item['cpf']; ?></td>
					<td><?php echo $item['dt_nasc']; ?></td>
					<td><?php echo $item['tipo_pessoa']; ?></td>
					<td><a href="alterar_pessoas.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
					<td><a href="excluir_pessoas_db.php?id=<?php echo $item['id']; ?>">Excluir</a></td>
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