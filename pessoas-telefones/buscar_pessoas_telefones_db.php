<?php
	include('../conexao.php');
	$nome = $_POST['nome'];
	
	$sql = "SELECT pt.id, pt.nro_telefone, pt.descricao, pt.id_pessoa, p.nome  
				FROM pessoas_telefones pt 
				INNER JOIN pessoas p ON pt.id_pessoa = p.id
				WHERE p.nome LIKE '%$nome%'";
	$query = mysqli_query($con, $sql);
	if (!$query) {
		echo 'Erro: ' . mysqli_error($con);
	}
	while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
	<tr id="tr<?= $item['id']?>">
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['nro_telefone']; ?></td>
		<td><?php echo $item['descricao']; ?></td>
		<td><?php echo $item['id_pessoa']; ?></td>
		<td><?php echo $item['nome']; ?></td>
		<td><a class="btn-alterar" href="alterar_pessoas_telefones.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
		<td><button id="<?= $item['id']?>" class="btn-excluir" value="<?= $item['id']?>">Excluir</button></td>
	</tr>
<?php
	}
	mysqli_close($con);
?>