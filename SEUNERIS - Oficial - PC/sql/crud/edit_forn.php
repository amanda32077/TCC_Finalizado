<?php
session_start();
include('../conecta.php');

    
$nome = mysqli_escape_string($conecta, $_POST['nome']);
$nome_vendedor = mysqli_escape_string($conecta, $_POST['nome_vendedor']);
$telefone = mysqli_escape_string($conecta, $_POST['telefone_vendedor']);
$email = mysqli_escape_string($conecta, $_POST['email_vendedor']);

$idfornecedor = mysqli_escape_string($conecta, $_POST['idfornecedor']);
$idempresa = mysqli_escape_string($conecta, $_POST['idempresa']);

    $busca= "SELECT vendedor.idvendedor, contato.idcontato FROM fornecedor
    INNER JOIN empresa_fornecedor ON fornecedor.idfornecedor=empresa_fornecedor.idfornecedor
    INNER JOIN empresa ON empresa.idempresa= empresa_fornecedor.idempresa
    INNER JOIN fornecedor_vendedor ON fornecedor.idfornecedor=fornecedor_vendedor.idfornecedor
    INNER JOIN vendedor ON vendedor.idvendedor=fornecedor_vendedor.idvendedor
    INNER JOIN contato ON vendedor.idvendedor=contato.idvendedor   
    WHERE fornecedor.idfornecedor=$idfornecedor and empresa.idempresa=$idempresa";
    $b=mysqli_query($conecta, $busca);
    $resul=mysqli_fetch_array($b);
    $idvendedor=$resul['idvendedor'];
    $idcontato=$resul['idvendedor'];

	$fornecedor = "UPDATE fornecedor SET nome='$nome' WHERE idfornecedor = '$idfornecedor'";
    $f= mysqli_query($conecta, $fornecedor);
    
    $vendedor = "UPDATE vendedor SET nome='$nome_vendedor' WHERE idvendedor = '$idvendedor'";
    $v= mysqli_query($conecta, $vendedor);
    
    $contato = "UPDATE contato SET telefone='$telefone' , email='$email' WHERE idcontato = '$idcontato'";
	$c= mysqli_query($conecta, $contato);

    header('Location: ../../usuario/acesso_usuario/com_usuario/index.php');

?>