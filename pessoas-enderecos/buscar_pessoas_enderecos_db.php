<?php
	include('../conexao.php');
	$nome = $_POST['nome'];
	
	$sql = "SELECT pe.id, pe.numero, pe.descricao, pe.bairro, pe.id_pessoa, p.nome,  
						pe.id_cidade, c.descricao as nome_cidade
					FROM pessoas_enderecos pe 
					INNER JOIN pessoas p ON pe.id_pessoa = p.id
					INNER JOIN cidades c ON pe.id_cidade = c.id
					WHERE p.nome LIKE '%$nome%'";
	$query = mysqli_query($con, $sql);
	if (!$query) {
		echo 'Erro: ' . mysqli_error($con);
	}
	while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
	<tr id="tr<?= $item['id']?>">
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['id_pessoa']; ?></td>
		<td><?php echo $item['nome']; ?></td>
		<td><?php echo $item['id_cidade']; ?></td>
		<td><?php echo $item['nome_cidade']; ?></td>
		<td><?php echo $item['bairro']; ?></td>
		<td><?php echo $item['numero']; ?></td>
		<td><?php echo $item['descricao']; ?></td>
		<td><a class="btn-alterar" href="alterar_pessoas_enderecos.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
		<td><button id="<?= $item['id']?>" class="btn-excluir" value="<?= $item['id']?>">Excluir</button></td>
	</tr>
<?php
	}
	mysqli_close($con);
?>