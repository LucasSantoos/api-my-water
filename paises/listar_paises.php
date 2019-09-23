<?php
	include('../validar.php');
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Paises</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
		<br><br><a href="cadastrar_paises.php">Cadastrar</a>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Descrição</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$sql = 'SELECT id, descricao FROM paises';
			$query = mysqli_query($con, $sql);
			if (!$query) {
				echo 'Erro: ' . mysqli_error($con);
			}
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['descricao']; ?></td>
					<td><a href="alterar_paises.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
					<td><a href="excluir_paises_db.php?id=<?php echo $item['id']; ?>">Excluir</a></td>
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