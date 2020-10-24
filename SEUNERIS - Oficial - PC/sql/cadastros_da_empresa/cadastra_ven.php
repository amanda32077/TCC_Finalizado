
<?php

session_start();
include("../conecta.php");

    $idvenda = $_POST['idvenda'];
    $idproduto = $_POST['idproduto'];
    $quantidade = $_POST['quantidade'];

    $busca="SELECT descricao , codigo_de_venda, preco FROM produto WHERE idproduto=$idproduto";
    $manda=mysqli_query($conecta, $busca);
    $prod=mysqli_fetch_array($manda);
    $descricao=$prod['descricao'];
    $preco=$prod['preco'];
    $codigo_de_venda=$prod['codigo_de_venda'];
    
    $produto_venda = "INSERT INTO produto_venda( idvenda, descricao, preco, codigo_de_venda, quantidade, idproduto) VALUES ('$idvenda', '$descricao', '$preco', '$codigo_de_venda', '$quantidade', '$idproduto')";
    $primeiro = mysqli_query($conecta, $produto_venda);
    $conta = mysqli_affected_rows($conecta);
    
    if ($conta >0) {

        $select="SELECT quantidade FROM produto WHERE idproduto=$idproduto";
        $segundo = mysqli_query($conecta, $select);    
        $dado= mysqli_fetch_array($segundo);
        $nova_quant= $dado['quantidade']-$quantidade;

        $produto = "UPDATE produto SET quantidade = '$nova_quant' WHERE idproduto=$idproduto";
        $terceiro= mysqli_query($conecta, $produto);
        $teste = mysqli_affected_rows($conecta);

            if ($nova_quant <= 0) {
                $nova_quant=0;
                $produto = "UPDATE produto SET quantidade = '$nova_quant' WHERE idproduto=$idproduto";
                $terceiro= mysqli_query($conecta, $produto);
                $teste = mysqli_affected_rows($conecta);
            }

    }
                        
    $_SESSION['idvenda']=$idvenda;
    header("location: ../../usuario/acesso_usuario/com_usuario/tela_de_registros/cadastros_da_empresa/cadastro_ven.php");

?>