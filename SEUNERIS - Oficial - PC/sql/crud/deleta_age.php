<?php

session_start();
include('../conecta.php');

	$idagenda = mysqli_escape_string($conecta, $_GET['idagenda']);

	$agenda = "DELETE FROM agenda WHERE idagenda = '$idagenda'";
	$primeira= mysqli_query($conecta, $agenda);

		header('Location: ../../usuario/acesso_usuario/com_usuario/index.php');

?>