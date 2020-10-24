
<?php

session_start();
include("../conecta.php");

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$empresa = "SELECT * FROM empresa WHERE nome='$nome' and senha='$senha' ";

$primeiro = mysqli_query($conecta, $empresa);
$conta = mysqli_affected_rows($conecta);
$busca = mysqli_fetch_array($primeiro);
$idempresa = $busca['idempresa'];


if ($conta > 0) {
    session_start();
    $_SESSION['idempresa'] =$idempresa;
    header("location: ../../usuario/acesso_usuario/com_usuario/index.php");   
}else {
   echo $nome;
}
    

?>