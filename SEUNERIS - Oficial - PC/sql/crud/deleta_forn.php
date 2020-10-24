<?php

session_start();
include('../conecta.php');

    $idfornecedor = mysqli_escape_string($conecta, $_GET['idfornecedor']);

    $emp_for = "DELETE FROM empresa_fornecedor WHERE idfornecedor = '$idfornecedor'";
    $primeira= mysqli_query($conecta, $emp_for);

    $for_ven = "DELETE FROM fornecedor_vendedor WHERE idfornecedor = '$idfornecedor'";
    $segunda= mysqli_query($conecta, $for_ven);

    $fornecedor = "DELETE FROM fornecedor WHERE idfornecedor = '$idfornecedor'";
    $terceira= mysqli_query($conecta, $fornecedor);

		header('Location: ../../usuario/acesso_usuario/com_usuario/index.php');


?>