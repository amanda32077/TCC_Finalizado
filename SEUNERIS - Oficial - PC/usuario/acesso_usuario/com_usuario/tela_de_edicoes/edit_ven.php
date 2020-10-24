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
                            <div class="table">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th class="border-0" style="width:300px">Produto</th>
                                                        <th class="border-0" style="width:1px">Quantidade</th>
                                                        <th class="border-0" style="width:1px">Valor Unitário</th>
                                                        <th class="border-0" style="width:1px">Código de Venda</th>
                                                        <th class="border-0" style="width:1px">Data Venda</th>
                                                        <th class="border-0" style="width:1px"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        
                                                        if (isset($_SESSION['data'])) {
                                                            $data= $_SESSION['data'];
                                                        }else{
                                                            $_SESSION['data']=$data;
                                                        }
                                                        
                                                        $idproduto_venda=$_GET['idproduto_venda'];

                                                        $venda = "SELECT produto_venda.idproduto, produto_venda.quantidade, produto_venda.preco, 
                                                        produto_venda.descricao, produto_venda.codigo_de_venda, produto_venda.idproduto_venda FROM produto_venda 
                                                        INNER JOIN venda ON venda.idvenda=produto_venda.idvenda 
                                                        WHERE venda.idempresa=$idempresa and venda.data_venda='$data'";
                                                        $primeiro = mysqli_query($conecta, $venda);

                                                        if(mysqli_num_rows($primeiro) > 0){
                                                        while($dado = mysqli_fetch_array($primeiro)){
                                                    ?> 
                                                        <tr>
                                                            <form method="POST" action="../../../../sql/crud/edit_ven.php">
                                                                <input type="hidden" value="<?php echo $dado['idproduto']?>" name="idproduto">
                                                                <input type="hidden" value="<?php echo $idvenda?>" name="idvenda">
                                                                <input type="hidden" value="<?php echo $idproduto_venda?>" name="idproduto_venda">
                                                                <input type="hidden" value="<?php echo $dado['quantidade']?>" name="quant_ant">
                                                                <td><input class="col-md-11" type="text" name="descricao" value="<?php echo $dado['descricao']?>"></td>
                                                                <td><input class="col-md-7" type="number" name="quantidade" value="<?php echo $dado['quantidade']?>"></td>
                                                                <td><input class="col-md-8" type="text" name="preco" value="<?php echo $dado['preco']?>"></td>                                                            
                                                                <td><input class="col-md-8" type="number" name="codigo_de_venda" value="<?php echo $dado['codigo_de_venda']?>"></td>
                                                                <td><?php echo date('d/m/Y', strtotime($data))?></td>
                                                                <td><button type="submit" class="card btn seg">OK</button></td>
                                                          </form>      
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
