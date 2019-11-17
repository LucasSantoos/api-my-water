<?php
	include('../validar.php');
	include('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Estados</title>
		<script type="text/javascript" src="../jquery-3.4.1.min.js"></script>
		<script>
		$(document).ready(function () {
				$('.btn-excluir').on('click', function () {
					var id = $(this).val();
					var confirma = confirm("Deseja excluir o item: "+id+"?");
					if(confirma){
						var tr = '#tr'+id;
						$.ajax({
							url: 'excluir_estados_db.php',
							method: 'POST',
							data: {
								id: id
							}
						}).done(function (html) {
							if(html == 1) {
								alert('Estado excluído com sucesso!');
								$(tr).empty();
							} else {
								alert('Não foi possível excluir este item pois o mesmo está sendo usado em outro cadastro.');
							}
						});
					}
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
		?>
			</tbody>
		</table>
		Existe(m) <?php echo mysqli_num_rows($query); ?> Registro(s)
	</body>
</html>
<?php
	mysqli_close($con);
?>