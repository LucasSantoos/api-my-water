<?php
	include('../validar.php');
	include('../conexao.php');
	$id = $_GET['id'];

	$sql = "SELECT ec.id, ec.dt_afericao, ec.vl_relogio_mes_atual, ec.vl_relogio_mes_passado, ec.vl_tarifa_mes, ec.vl_total, ec.id_cliente, ec.id_funcionario 
			from emissao_conta ec WHERE id = $id";
	$query = mysqli_query($con, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Emissão conta</title>
		<script type="text/javascript" src="../jquery-3.4.1.min.js"></script>
		<script>
		$(document).ready(function () {
				$('.btn-enviar').on('click', function () {
					var id = $('#id').val();
					var dt_afericao = $('#dt_afericao').val();
					var vl_relogio_mes_atual = $('#vl_relogio_mes_atual').val();
					var vl_relogio_mes_passado = $('#vl_relogio_mes_passado').val();
					var vl_tarifa_mes = $('#vl_tarifa_mes').val();
					var id_cliente = $('#id_cliente').val();
					var id_funcionario = $('#id_funcionario').val();
					$.ajax({
						url: 'alterar_emissao_conta_db.php',
						method: 'POST',
						data: {
							id: id,
							dt_afericao: dt_afericao,
							vl_relogio_mes_atual: vl_relogio_mes_atual,
							vl_relogio_mes_passado: vl_relogio_mes_passado,
							vl_tarifa_mes: vl_tarifa_mes,
							id_cliente: id_cliente,
							id_funcionario: id_funcionario
						}
					}).done(function (html) {
						window.location.replace("http://localhost/app-my-water/emissao-conta/listar_emissao_conta.php");
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
		<br><br>

		<form>
			<input id="id"type="hidden" name="id" value="<?php echo $item['id']; ?>">
			Código: <?php echo $item['id']; ?><br><br>
			
			<label for="dt_afericao">Data aferição</label><br>
			<input type="date" name="dt_afericao" id="dt_afericao" value="<?php echo $item['dt_afericao']; ?>"><br><br>

			<label for="vl_relogio_mes_atual">Valor rel. mês atual</label><br>
			<input type="text" name="vl_relogio_mes_atual" id="vl_relogio_mes_atual" maxlength="4" value="<?php echo $item['vl_relogio_mes_atual']; ?>"><br><br>

			<label for="vl_relogio_mes_passado">Valor rel. mês pass.</label><br>
			<input type="text" name="vl_relogio_mes_passado" id="vl_relogio_mes_passado" maxlength="4" value="<?php echo $item['vl_relogio_mes_passado']; ?>"><br><br>

			<label for="vl_tarifa_mes">Valor tarifa</label><br>
			<input type="text" name="vl_tarifa_mes" id="vl_tarifa_mes" maxlength="4" value="<?php echo $item['vl_tarifa_mes']; ?>"><br><br>

			<label for="id_cliente">Cliente</label><br>
			<select name="id_cliente" id="id_cliente">
				<?php
					$sql = "SELECT id as id_cliente, nome FROM pessoas WHERE tipo_pessoa = 'cliente'";
					$query = mysqli_query($con, $sql);
					while ($item_cliente = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item_cliente['id_cliente']; ?>" 
				<?=($item['id_cliente'] == $item_cliente['id_cliente']) ? 'selected':''?> >
				<?php echo $item_cliente['nome']; ?></option>
				<?php
					}
				?>
			</select><br>
			<label for="id_funcionario">Funcionário</label><br>
			<select name="id_funcionario" id="id_funcionario">
				<?php
					$sql = "SELECT id as id_funcionario, nome FROM pessoas WHERE tipo_pessoa = 'funcionario'";
					$query = mysqli_query($con, $sql);
					while ($item_funcionario = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item_funcionario['id_funcionario']; ?>"
				<?=($item['id_funcionario'] == $item_funcionario['id_funcionario']) ? 'selected':''?> >
				<?php echo $item_funcionario['nome']; ?></option>
				<?php
					}
				?>
			</select>
			<br><br>
			<button class="btn-enviar">Salvar</button>
		</form>
	</body>
</html>
<?php
	mysqli_close($con);
?>