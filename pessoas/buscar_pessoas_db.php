<?php
	include('../conexao.php');
	$nome = $_POST['nome'];
	
	$sql = "SELECT id, nome, cpf, dt_nasc, tipo_pessoa, imagem FROM pessoas WHERE nome LIKE '%$nome%'";
	$query = mysqli_query($con, $sql);
	if (!$query) {
		echo 'Erro: ' . mysqli_error($con);
	}
	while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
	<tr id="tr<?= $item['id']?>">
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['nome']; ?></td>
		<td><?php echo $item['cpf']; ?></td>
		<td><?php echo $item['dt_nasc']; ?></td>
		<td><?php echo $item['tipo_pessoa']; ?></td>
		<td><a class="btn-alterar" href="alterar_pessoas.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
		<td><button id="<?= $item['id']?>" class="btn-excluir" value="<?= $item['id']?>">Excluir</button></td>
	</tr>
<?php
	}
	mysqli_close($con);
?>