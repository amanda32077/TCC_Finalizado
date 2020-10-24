<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Produtos Vendidos</title>
    <link rel="stylesheet" href="../../../../../style/css/bootstrap.min.css">
</head>

<style>     
    .pri{
      color: red;
      background-color: white;
    }
    .pri:hover {
      color: white;
      background-color: red;
    }
    .priedi{
      color: rgb(3, 3, 121);
      background-color: white;
    }
    .priedi:hover {
      color: white;
      background-color: rgb(3, 3, 121);
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
        border : 1px solid rgb(3, 3, 121);
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
</style>

<?php
session_start();

if (isset($_SESSION['idempresa'])) {
    $idempresa= $_SESSION['idempresa'];

    if (isset($_SESSION['idvenda'])) {
        $idvenda=$_SESSION['idvenda']; 
      }
}else {
    echo "LOGIN NÃO EFETUADO";
    exit;
}
include "../../../../../sql/conecta.php";
?>

<body style="background-color: #ececf6; font-family:'Times New Roman', Times, serif;">
    <div class="container col-md-8">
        <div class="card" style="margin-top: 10%; width=10%;">
            <div class="card-header" style=" background-color:rgb(3, 3, 121); color:white">Últimas Vendas
                <a href="cadastro_ven.php" class="btn btn-primary float-right">Voltar</a>
            </div>                      
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0">Produto</th>
                                <th class="border-0">Quantidade</th>
                                <th class="border-0">Valor Total</th>
                                <th class="border-0"></th>
                                <th class="border-0"></th>
                            </tr>
                        </thead>
                            <?php                                                    
                                $venda = "SELECT produto_venda.descricao as produto, produto_venda.quantidade, 
                                produto_venda.preco*produto_venda.quantidade as valor_total, produto_venda.idproduto_venda FROM produto_venda 
                                INNER JOIN venda ON produto_venda.idvenda=venda.idvenda
                                WHERE venda.idempresa=$idempresa and venda.idvenda=$idvenda";
                                $primeiro = mysqli_query($conecta, $venda);

                                    if(mysqli_num_rows($primeiro) > 0){
                                        while($dados = mysqli_fetch_array($primeiro)){
                            ?>
                            <tr>
                                <td><?php echo $dados['produto']?></td>
                                <td><?php echo $dados['quantidade']?></td>
                                <td><?php echo number_format($dados['valor_total'], 2, ',', '.')?></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
