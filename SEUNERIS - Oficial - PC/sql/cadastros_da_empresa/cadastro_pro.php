
<?php

session_start();
include("../conecta.php");

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

        $adicao = "UPDATE produto SET quantidade = quantidade+'$quantidade', preco='$preco' WHERE descricao='$descricao' and codigo_de_venda='$codigo_de_venda' and idtipo='$idtipo' and idfornecedor='$idfornecedor' and idempresa='$idempresa'";
        $muda = mysqli_query($conecta, $adicao);
        $resultado =mysqli_affected_rows($conecta);

        if ($resultado>0) {
            header('location: ../../usuario/acesso_usuario/com_usuario/tela_de_registros/cadastros_da_empresa/cadastro_pro.php');
        }else {
            $produto_estoque = "INSERT INTO produto(quantidade, descricao, codigo_de_venda, preco, quantidade_minima, idtipo, idfornecedor, idempresa) VALUES ('$quantidade', '$descricao', '$codigo_de_venda', '$preco', '$quantidade', '$idtipo', '$idfornecedor', '$idempresa')";
            $quarto = mysqli_query($conecta, $produto_estoque);
            $conf = mysqli_affected_rows($conecta);

            header('location: ../../usuario/acesso_usuario/com_usuario/tela_de_registros/cadastros_da_empresa/cadastro_pro.php');
        }
                

?>