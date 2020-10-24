
<?php

session_start();
include("../conecta.php");

    $idvenda = $_POST['idvenda'];
    $idproduto_venda = $_POST['idproduto_venda'];
    $idproduto = $_POST['idproduto'];
    $quant_ant = $_POST['quant_ant'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $codigo_de_venda = $_POST['codigo_de_venda'];

    $produto_venda = "UPDATE produto_venda SET descricao='$descricao', preco='$preco', codigo_de_venda='$codigo_de_venda', quantidade='$quantidade' WHERE idproduto_venda=$idproduto_venda";
    $primeiro = mysqli_query($conecta, $produto_venda);
    $conta = mysqli_affected_rows($conecta);
    
    if ($conta >0) {

        $select="SELECT quantidade FROM produto WHERE idproduto=$idproduto";
        $segundo = mysqli_query($conecta, $select);    
        $dado=mysqli_fetch_array($segundo);
        $nova_quant= $dado['quantidade']+$quant_ant-$quantidade;

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
                        
    $_SESSION['data']=$data;
    header('location: ../../usuario/acesso_usuario/com_usuario/tela_visualizar_informacao/produto_ven.php');

?>