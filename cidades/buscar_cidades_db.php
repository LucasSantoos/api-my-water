<?php
	include('../conexao.php');
	$nome = $_POST['nome'];
	
	$sql = "SELECT c.id, c.descricao, c.id_estado, e.descricao as descricao_estado  
					FROM cidades c 
					INNER JOIN estados e ON c.id_estado = e.id
					WHERE c.descricao LIKE '%$nome%'";
	$query = mysqli_query($con, $sql);
	if (!$query) {
		echo 'Erro: ' . mysqli_error($con);
	}
	while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
	<tr id="tr<?= $item['id']?>">
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['descricao']; ?></td>
		<td><?php echo $item['id_estado']; ?></td>
		<td><?php echo $item['descricao_estado']; ?></td>
		<td><a class="btn-alterar" href="alterar_cidades.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
		<td><button id="<?= $item['id']?>" class="btn-excluir" value="<?= $item['id']?>">Excluir</button></td>
	</tr>
<?php
	}
	mysqli_close($con);
?>