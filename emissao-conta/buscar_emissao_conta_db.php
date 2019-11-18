<?php
	include('../conexao.php');
	$nome = $_POST['nome'];
	
	$sql = "SELECT ec.id, ec.dt_afericao, ec.vl_relogio_mes_atual, ec.vl_relogio_mes_passado, 
			ec.vl_tarifa_mes, ec.vl_total, ec.id_cliente, ec.id_funcionario, c.nome AS nome_cliente, f.nome AS nome_funcionario
			from emissao_conta ec 
			inner join pessoas c on ec.id_cliente = c.id
			inner join pessoas f on ec.id_funcionario = f.id
			WHERE c.nome LIKE '%$nome%'";
	$query = mysqli_query($con, $sql);
	if (!$query) {
		echo 'Erro: ' . mysqli_error($con);
	}
	while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
	<tr id="tr<?= $item['id']?>">
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['dt_afericao']; ?></td>
		<td><?php echo $item['vl_relogio_mes_atual']; ?></td>
		<td><?php echo $item['vl_relogio_mes_passado']; ?></td>
		<td><?php echo $item['vl_tarifa_mes']; ?></td>
		<td><?php echo $item['id_cliente']; ?></td>
		<td><?php echo $item['nome_cliente']; ?></td>
		<td><?php echo $item['id_funcionario']; ?></td>
		<td><?php echo $item['nome_funcionario']; ?></td>
		<td><?php echo $item['vl_total']; ?></td>
		<td><a class="btn-alterar" href="alterar_emissao_conta.php?id=<?php echo $item['id']; ?>">Alterar</a></td>
		<td><button id="<?= $item['id']?>" class="btn-excluir" value="<?= $item['id']?>">Excluir</button></td>
	</tr>
<?php
	}
	mysqli_close($con);
?>