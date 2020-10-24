<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Produtos no Estoque</title>
    <link rel="stylesheet" href="../../../../style/css/bootstrap.min.css">
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
                        <div class="card-header" style=" background-color: rgb(228, 167, 25); color:white">Produtos no Estoque
                            <a href="../index.php" class="btn seg float-right">Voltar</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0 cor">Produto</th>
                                            <th class="border-0 cor">Preço</th>
                                            <th class="border-0 cor">Tipo</th>
                                            <th class="border-0 cor">Quantidade</th>
                                            <th class="border-0 cor">Empresa Fornecedora</th>
                                            <th class="border-0 cor">Codigo</th>
                                            <th class="border-0"></th>
                                            <th class="border-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                        <?php
                                        $tipo=$_GET['tipo'];
                                        $_SESSION['tipo']=$tipo;
                                        
                                            $produto = "SELECT produto.idproduto, produto.descricao, produto.preco, tipo.descricao as tipo, produto.quantidade,
                                            fornecedor.nome, produto.codigo_de_venda FROM produto 
                                            INNER JOIN fornecedor ON produto.idfornecedor=fornecedor.idfornecedor
                                            INNER JOIN tipo ON tipo.idtipo=produto.idtipo
                                            WHERE produto.idempresa=$idempresa and tipo.descricao='$tipo' and produto.quantidade!=0";
                                            $primeiro = mysqli_query($conecta, $produto);
                            
                                            if(mysqli_num_rows($primeiro) > 0){
                                                while($produto = mysqli_fetch_array($primeiro)){
                                        ?>
                                        <tr>
                                            <td class="color"><?php echo $produto['descricao']?></td>
                                            <td class="color"><?php echo number_format($produto['preco'], 2, ',', ' ')?></td>
                                            <td class="color"><?php echo $produto['tipo']?></td>
                                            <td class="color"><?php echo $produto['quantidade']?></td>
                                            <td class="color"><?php echo $produto['nome']?> </td>
                                            <td class="color"><?php echo $produto['codigo_de_venda']?></td>
                                            <td><a href="../../../../sql/crud/deleta_proest.php?idproduto=<?php echo $produto['idproduto']?>" class="card btn pri">Apagar</a></td>
                                            <td><a href="../tela_de_edicoes/edit_prod.php?idproduto=<?php echo $produto['idproduto']?>" class="card btn blue">Editar</a></td>
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
