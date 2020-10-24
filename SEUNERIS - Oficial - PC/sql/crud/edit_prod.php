
<?php

session_start();
include("../conecta.php");

$idproduto=$_POST['idproduto'];

$quantidade = $_POST['quantidade'];
$descricao = $_POST['descricao'];
$tipo = $_POST['tipo'];
$idfornecedor = $_POST['idfornecedor'];
$idempresa = $_POST['idempresa'];
$codigo_de_venda = $_POST['codigo_de_venda'];
$preco =number_format($_POST['preco'], 2, '.', '.');

$select_tipo = "SELECT idtipo FROM tipo WHERE descricao= '$tipo'";
$primeiro = mysqli_query($conecta, $select_tipo);
$conta = mysqli_affected_rows($conecta);

    if ($conta > 0) {
        $dado =  mysqli_fetch_array($primeiro);
        $idtipo = $dado['idtipo'];
    }else {
        $insere_tipo = "INSERT INTO tipo(descricao)VALUES ('$tipo')";
        $segundo = mysqli_query($conecta, $insere_tipo);

            $pega_id = "SELECT idtipo FROM tipo WHERE descricao= '$tipo'";
            $terceiro = mysqli_query($conecta, $pega_id);
            $dado =  mysqli_fetch_array($terceiro);
            $idtipo = $dado['idtipo'];
    }

        $adicao = "UPDATE produto SET quantidade ='$quantidade', preco='$preco', descricao='$descricao', codigo_de_venda='$codigo_de_venda', idtipo='$idtipo', idfornecedor='$idfornecedor' WHERE idproduto='$idproduto'";
        $muda = mysqli_query($conecta, $adicao);

            header('location: ../../usuario/acesso_usuario/com_usuario/index.php');
                

?>