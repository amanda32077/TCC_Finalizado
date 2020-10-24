<?php

session_start();
include('../conecta.php');

    
$data = mysqli_escape_string($conecta, $_POST['data']);
$descricao = mysqli_escape_string($conecta, $_POST['descricao']);
$idagenda = mysqli_escape_string($conecta, $_POST['idagenda']);

	$agenda = "UPDATE agenda SET data='$data' , descricao='$descricao' WHERE idagenda = '$idagenda'";
	$primeira= mysqli_query($conecta, $agenda);

    header('Location: ../../usuario/acesso_usuario/com_usuario/index.php');

?>