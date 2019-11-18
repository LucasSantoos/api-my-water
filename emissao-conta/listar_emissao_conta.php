<?php
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Emissão conta</title>
		<script type="text/javascript" src="../jquery-3.4.1.min.js"></script>
		<script>
		$(document).ready(function () {
				$('.btn-excluir').on('click', function () {
					var id = $(this).val();
					var confirma = confirm("Deseja excluir o item: "+id+"?");
					if(confirma){
						var tr = '#tr'+id;
						$.ajax({
							url: 'excluir_emissao_conta_db.php',
							method: 'POST',
							data: {
								id: id
							}
						}).done(function (html) {
							if(html == 1) {
								alert('Conta excluída com sucesso!');
								$(tr).empty();
							} else {
								alert('Não foi possível excluir este item pois o mesmo está sendo usado em outro cadastro.');
							}
						});
					}
				});
				$('.buscar').on('click', function () {
					var nome = $('#nome').val();
					$.ajax({
						url: 'buscar_emissao_conta_db.php',
						method: 'POST',
						data: {
							nome: nome
						}
					}).done(function (html) {
						$('#emissao_conta tbody').empty();
						$('#emissao_conta tbody').html(html);
					});
				});
			});
		</script>
	</head>
		<body>
		<?php
			include('../menu.php');
		?>
		<br><br>
		Usuário:
		<?php
			echo $_SESSION['usuario']['LOGIN'];
		?>
		<br><br>
		<input type="text" name="nome" id="nome">
		<input type="button" class="buscar" name="buscar" id="buscar" value="Buscar">
		<br><br><a class="btn-cadastrar" href="cadastrar_emissao_conta.php">Cadastrar</a>
		<table id="emissao_conta">
			<thead>
				<tr>
					<th>Código</th>
					<th>Data aferição</th>
					<th>Valor rel. mês atual</th>
					<th>Valor rel. mês pass.</th>
					<th>Valor tarifa</th>
					<th>Código cliente</th>
					<th>Nome cliente</th>
					<th>Código funcionário</th>
					<th>Nome funcionário</th>
					<th>Valor total</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$sql = 'SELECT ec.id, ec.dt_afericao, ec.vl_relogio_mes_atual, ec.vl_relogio_mes_passado, 
			ec.vl_tarifa_mes, ec.vl_total, ec.id_cliente, ec.id_funcionario, c.nome AS nome_cliente, f.nome AS nome_funcionario
			from emissao_conta ec 
			inner join pessoas c on ec.id_cliente = c.id
			inner join pessoas f on ec.id_funcionario = f.id';
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
		?>
			</tbody>
		</table>
		Existe(m) <?php echo mysqli_num_rows($query); ?> Registro(s)
	</body>
</html>
<?php
	mysqli_close($con);
?>