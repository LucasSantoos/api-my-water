<?php
	include('../conexao.php');
	$id = $_POST['id'];
	$sql = "DELETE FROM pessoas_enderecos WHERE id = $id";
	echo mysqli_query($con, $sql);
	mysqli_close($con);
?>