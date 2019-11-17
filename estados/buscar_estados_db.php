<?php
	include('../conexao.php');
	$nome = $_POST['nome'];
	
	$sql = "SELECT e.id, e.descricao, e.id_pais, p.descricao as descricao_pais  
					FROM estados e 
					INNER JOIN paises p ON e.id_pais = p.id
					WHERE e.descricao LIKE '%$nome%'";
	$query = mysqli_query($con, $sql);
	if (!$query) {
		echo 'Erro: ' . mysqli_error($con);
	}
	while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
	<tr id="tr<?= $item['id']?>">
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['descricao']; ?></td>
		<td><?php echo $item['id_pais']; ?></td>
		<td><?php echo $item['descricao_pais']; ?></td>
		<td><a class="btn-alterar" href="alterar_estados.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
		<td><button id="<?= $item['id']?>" class="btn-excluir" value="<?= $item['id']?>">Excluir</button></td>
	</tr>
<?php
	}
	mysqli_close($con);
?>