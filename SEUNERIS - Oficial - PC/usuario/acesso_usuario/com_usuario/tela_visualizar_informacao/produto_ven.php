<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../../style/css/bootstrap.min.css">

    <title>Produtos Vendidos</title>
</head>

<body>
 
<style>     
    .pri{
      color: red;
      background-color: white;
    }
    .pri:hover {
      color: white;
      background-color: red;
    }
    .seg{
      color: rgb(228, 167, 25);
      background-color: white;
      border: 1px solid rgb(228, 167, 25) ;
    }
    .seg:hover{
      color: white;
      background-color: rgb(228, 167, 25);
    }
    .btn-primary{
        color: white;
        background-color: rgb(3, 3, 121);
    }
    .btn-primary:hover{
        color: rgb(3, 3, 121);
        background-color: white;
    }
    .cor{
        color: rgb(228, 167, 25);
    }
    .color{
        color: rgb(117, 117, 117);
    }
    .edit{
        color: rgb(3, 3, 121);
        background-color: white;
    }
    .edit:hover{
        color: white;
        background-color: rgb(3, 3, 121);
    }
    .blue{
    color: rgb(3, 3, 121);
    background-color: white;
    }
    .blue:hover{
        color: white;
        background-color: rgb(3, 3, 121);
    }
</style>

<?php
session_start();

if (isset($_SESSION['idempresa'])) {
    $idempresa= $_SESSION['idempresa'];
}else {
    echo "LOGIN NÃO EFETUADO";
    exit;
}
include "../../../../sql/conecta.php";
?>

<body style="background-color: #ececf6; font-family:'Times New Roman', Times, serif;">
    <div class="container col-md-11">
        <div class="card" style="margin-top: 10%; width=10%;">
                        <div class="card-header" style=" background-color: rgb(228, 167, 25); color:white">Produtos Vendidos
                            <a href="../index.php" class="btn seg float-right">Voltar</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Produto</th>
                                                        <th class="border-0">Quantidade</th>
                                                        <th class="border-0">Valor Total</th>
                                                        <th class="border-0">Código de Venda</th>
                                                        <th class="border-0">Data Venda</th>
                                                        <th class="border-0"></th>
                                                        <th class="border-0"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 

                                                        if (isset($_SESSION['data'])) {
                                                            $data= $_SESSION['data'];
                                                        }else{
                                                            $data=$_GET['data'];
                                                            $_SESSION['data']=$data;
                                                        }

                                                        $venda = "SELECT produto_venda.quantidade, produto_venda.preco*produto_venda.quantidade as valor_total, 
                                                        produto_venda.descricao, produto_venda.codigo_de_venda, produto_venda.idproduto_venda FROM produto_venda 
                                                        INNER JOIN venda ON venda.idvenda=produto_venda.idvenda 
                                                        WHERE venda.idempresa=$idempresa and venda.data_venda='$data'";
                                                        $primeiro = mysqli_query($conecta, $venda);

                                                        if(mysqli_num_rows($primeiro) > 0){
                                                        while($dado = mysqli_fetch_array($primeiro)){
                                                    ?> 
                                                        <tr>
                                                            <td ><?php echo $dado['descricao']?></td>
                                                            <td ><?php echo $dado['quantidade']?></td>
                                                            <td ><?php echo number_format($dado['valor_total'], 2, ',', '.')?></td>                                                            
                                                            <td ><?php echo $dado['codigo_de_venda']?></td>
                                                            <td ><?php echo date('d/m/Y', strtotime($data))?></td>
                                                            <td ><a href="../../../../sql/crud/deleta_ven.php?idproduto_venda=<?php echo $dado['idproduto_venda']?>" class="card btn pri">Apagar</a></td>
                                                            <td ><a href="../tela_de_edicoes/edit_ven.php?idproduto_venda=<?php echo $dado['idproduto_venda']?>" class="card btn blue">Editar</a></td>
                                                        </tr>                            
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                        
                                                </tbody>
                                            </table>
                            </div>
                    </div>

    </div>
</body>
</html>
