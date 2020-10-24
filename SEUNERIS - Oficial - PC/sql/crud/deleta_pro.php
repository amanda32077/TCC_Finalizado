<?php

session_start();
include('../conecta.php');

	$idproduto_venda = mysqli_escape_string($conecta, $_GET['idproduto_venda']);

	$data_venda = "DELETE FROM produto_venda WHERE idproduto_venda = '$idproduto_venda'";
	$primeira= mysqli_query($conecta, $data_venda);

		header('Location: ../../usuario/acesso_usuario/com_usuario/tela_de_registros/cadastros_da_empresa/finaliza_ven.php');


	?>