
<?php

session_start();
include("../conecta.php");

$idempresa = $_POST['idempresa'];
$data_venda = $_POST['data_venda'];

$venda = "INSERT INTO venda( data_venda,  idempresa) VALUES ('$data_venda', '$idempresa')";
$primeiro = mysqli_query($conecta, $venda);

    $passa = "SELECT idvenda FROM venda WHERE data_venda='$data_venda' and idempresa='$idempresa'";
    $segundo = mysqli_query($conecta,$passa);
    $dado = mysqli_fetch_array($segundo);
    $idvenda = $dado['idvenda'];
    
        $conta = mysqli_affected_rows($conecta);
                    
if ($conta >0) {
    session_start();
    $_SESSION['idvenda']=$idvenda;
    header("location: ../../usuario/acesso_usuario/com_usuario/index.php");
}else {
    header('location:  ../../usuario/acesso_usuario/com_usuario/tela_de_registros/cadastros_da_empresa/data_ven.php');
}
?>