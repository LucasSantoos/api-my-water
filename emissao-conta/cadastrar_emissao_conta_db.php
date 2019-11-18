<?php
	include('../conexao.php');

	$dt_afericao = $_POST['dt_afericao'];
	$vl_relogio_mes_atual = $_POST['vl_relogio_mes_atual'];
	$vl_relogio_mes_passado = $_POST['vl_relogio_mes_passado'];
	$vl_tarifa_mes = $_POST['vl_tarifa_mes'];
	$id_cliente = $_POST['id_cliente'];
	$id_funcionario = $_POST['id_funcionario'];
	$vl_total = $vl_tarifa_mes * ($vl_relogio_mes_atual - $vl_relogio_mes_passado);

	$sql = "INSERT INTO emissao_conta (dt_afericao, vl_relogio_mes_atual, vl_relogio_mes_passado, 
	vl_tarifa_mes, id_cliente, id_funcionario, vl_total) 
	VALUES ('$dt_afericao', $vl_relogio_mes_atual, $vl_relogio_mes_passado, $vl_tarifa_mes, $id_cliente, $id_funcionario, $vl_total)";
	
	$query = mysqli_query($con, $sql);
	mysqli_close($con);
?>