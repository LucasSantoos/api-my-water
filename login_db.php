<?php
	session_start();
	include('conexao.php');
	
	$login = $_POST['login'];
	$senha = md5($_POST['senha']);
	
	$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
	
	$query = mysqli_query($con, $sql);

	if(mysqli_num_rows($query) == 1) {
		$item = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$_SESSION['usuario'] = $item;
		header('Location: painel.php');
	} else {
		header('Location: index.php?erro=1');
	}
	
	mysqli_close($con);
?>