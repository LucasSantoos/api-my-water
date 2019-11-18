<?php
	include('../conexao.php');

	$id = $_POST['id'];
	$dt_afericao = $_POST['dt_afericao'];
	$vl_relogio_mes_atual = $_POST['vl_relogio_mes_atual'];
	$vl_relogio_mes_passado = $_POST['vl_relogio_mes_passado'];
	$vl_tarifa_mes = $_POST['vl_tarifa_mes'];
	$id_cliente = $_POST['id_cliente'];
	$id_funcionario = $_POST['id_funcionario'];
	$vl_total = $vl_tarifa_mes * ($vl_relogio_mes_atual - $vl_relogio_mes_passado);

	$sql = "UPDATE emissao_conta SET dt_afericao = '$dt_afericao', vl_relogio_mes_atual = $vl_relogio_mes_atual, 
	vl_relogio_mes_passado = $vl_relogio_mes_passado, vl_tarifa_mes = $vl_tarifa_mes, id_cliente = $id_cliente, 
	id_funcionario = $id_funcionario, vl_total = $vl_total WHERE id = $id";
	
	$query = mysqli_query($con, $sql);
	mysqli_close($con);
?>