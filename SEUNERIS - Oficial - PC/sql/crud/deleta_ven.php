
<?php

session_start();
include('../conecta.php');
if (isset($_SESSION['data'])) {
	$data=$_SESSION['data']; 
}

	$idproduto_venda = mysqli_escape_string($conecta, $_GET['idproduto_venda']);

	$busca="SELECT quantidade, idproduto FROM produto_venda WHERE idproduto_venda=$idproduto_venda";
	$manda=mysqli_query($conecta, $busca);
	$repor=mysqli_fetch_array($manda);
	$quantidade=$repor['quantidade'];
	$idproduto=$repor['idproduto'];

	$produto="UPDATE produto SET quantidade=quantidade+'$quantidade' WHERE idproduto='$idproduto'";
	$envio=mysqli_query($conecta, $produto);

	$data_venda = "DELETE FROM produto_venda WHERE idproduto_venda = '$idproduto_venda'";
	$primeira= mysqli_query($conecta, $data_venda);



	header("Location: ../../usuario/acesso_usuario/com_usuario/tela_visualizar_informacao/produto_ven.php?data=$data");
?>

