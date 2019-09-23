<?php
	include('../validar.php');
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Cidades</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
		<br><br><a class="btn-cadastrar" href="cadastrar_cidades.php">Cadastrar</a>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Descrição</th>
					<th>Código estado</th>
					<th>Descrição estado</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$sql = 'SELECT c.id, c.descricao, c.id_estado, e.descricao as descricao_estado  
					FROM cidades c 
					INNER JOIN estados e ON c.id_estado = e.id';
			$query = mysqli_query($con, $sql);

			if (!$query) {
				echo 'Erro: ' . mysqli_error($con);
			}
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {		
		?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['descricao']; ?></td>
					<td><?php echo $item['id_estado']; ?></td>
					<td><?php echo $item['descricao_estado']; ?></td>
					<td><a class="btn-alterar" href="alterar_cidades.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
					<td><a class="btn-excluir" href="excluir_cidades_db.php?id=<?php echo $item['id']; ?>">Excluir</a></td>
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