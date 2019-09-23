<?php
	include('../validar.php');
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Estados</title>
	</head>
	<body>
		<?php
			include('../menu.php');
		?>
		<br><br><a class="btn-cadastrar" href="cadastrar_estados.php">Cadastrar</a>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Descrição</th>
					<th>Código país</th>
					<th>Descrição país</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$sql = 'SELECT e.id, e.descricao, e.id_pais, p.descricao as descricao_pais  
					FROM estados e 
					INNER JOIN paises p ON e.id_pais = p.id';
			$query = mysqli_query($con, $sql);

			if (!$query) {
				echo 'Erro: ' . mysqli_error($con);
			}
			while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {		
		?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['descricao']; ?></td>
					<td><?php echo $item['id_pais']; ?></td>
					<td><?php echo $item['descricao_pais']; ?></td>
					<td><a class="btn-alterar" href="alterar_estados.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
					<td><a class="btn-excluir" href="excluir_estados_db.php?id=<?php echo $item['id']; ?>">Excluir</a></td>
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