
<?php

session_start();
include("../conecta.php");


$data_age =$_POST['data_age'];
$descricao =$_POST['descricao'];
$idempresa=$_POST['idempresa'];

$agenda = "INSERT INTO agenda( data, descricao, idempresa) VALUES ('$data_age', '$descricao', '$idempresa')";
$primeiro = mysqli_query($conecta, $agenda);

    header("location: ../../usuario/acesso_usuario/com_usuario/index.php");

?>