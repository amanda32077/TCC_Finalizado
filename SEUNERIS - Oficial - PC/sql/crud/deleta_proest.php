
<?php

session_start();
include('../conecta.php');

if (isset($_SESSION['tipo'])) {
    $tipo=$_SESSION['tipo'];
}

	$idproduto = mysqli_escape_string($conecta, $_GET['idproduto']);

	$deleta_produto = "DELETE FROM produto WHERE idproduto = '$idproduto'";
	$primeira= mysqli_query($conecta, $deleta_produto);

	header("Location: ../../usuario/acesso_usuario/com_usuario/tela_visualizar_informacao/produto_est.php?tipo=$tipo");
?>
