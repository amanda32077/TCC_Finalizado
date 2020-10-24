<?php

session_start();
include("../conecta.php");

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$empresa = "INSERT INTO empresa( senha, nome) VALUES ('$senha', '$nome')";
$primeiro = mysqli_query($conecta, $empresa);
$conta = mysqli_affected_rows($conecta);


if ($conta >0) {
    header('location: ../../usuario/acesso_usuario/login.html');
}else {
    header('location: ../../usuario/acesso_usuario/cadastro_emp.html');
}
?>