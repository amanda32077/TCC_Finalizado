<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="../../../../style/css/bootstrap.css">
</head>

<style> 
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
</style>

<?php
include "../../../../sql/conecta.php";
session_start();

if (isset($_SESSION['idempresa'])) {
    $idempresa= $_SESSION['idempresa'];
}else {
    echo "LOGIN NÃO EFETUADO";
    exit;
}

    $idproduto=$_GET['idproduto'];

    $busca= "SELECT produto.descricao, produto.preco, produto.quantidade, tipo.descricao as tipo, produto.codigo_de_venda FROM produto 
    INNER JOIN tipo ON tipo.idtipo=produto.idtipo
    WHERE idproduto=$idproduto";
    $teste= mysqli_query($conecta, $busca);
    $result=mysqli_fetch_array($teste);
?>

<body style="background-color: #ececf6; font-family:'Times New Roman', Times, serif;">
    <div class="container col-md-6">
        <div class="card" style="margin-top: 10%; width=10%;">
                        <div class="card-header" style=" background-color: rgb(228, 167, 25); color:white">Cadastro de Produto
                            <a href="../index.php" class="btn seg float-right">Voltar</a>
                        </div>
                        <div class="card-body">
                            <form action="../../../../sql/crud/edit_prod.php" method="post" novalidate="novalidate">
                            <input type="hidden" name="idempresa" value="<?php echo $idempresa?>">
                            <input type="hidden" name="idproduto" value="<?php echo $idproduto?>">
                                <div class="row form-group col-md-12">
                                    <div class="col-md-6" >
                                        <label for="descricao" class="control-label mb-6">Produto</label>
                                        <input name="descricao" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $result['descricao']?>">
                                    </div>    
                                    <div class="col-md-6" >
                                        <label for="tipo" class="control-label mb-1">Tipo</label>
                                        <input id="cc-name" name="tipo" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $result['tipo']?>">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-4" >
                                      <label for="preco" class="control-label mb-1">Preço</label>
                                        <div class="input-group">
                                            <input  name="preco" type="number" class="form-control cc-cvc" value="<?php echo $result['preco']?>" data-val="true" data-val-required="Please enter the security code"
                                                data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4" >
                                        <label for="quantidade" class="control-label mb-1">Quantidade </label>
                                        <div class="input-group">
                                            <input  name="quantidade" type="number" class="form-control cc-cvc" value="<?php echo $result['quantidade']?>" data-val="true" data-val-required="Please enter the security code"
                                                data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4" >
                                        <label for="codigo_de_venda" class="control-label mb-1">Código</label>
                                        <div class="input-group">
                                            <input  name="codigo_de_venda" type="number" class="form-control cc-cvc" data-val="true" data-val-required="Please enter the security code"
                                                data-val-cc-cvc="Please enter a valid security code" autocomplete="off" value="<?php echo $result['codigo_de_venda']?>">
                                        </div>
                                    </div>
                                    <div class="col col-md-12" >
                                        <div class="form-group col-md-12" style="margin-top:20px;" >
                                            <label for="idfornecedor" class="control-label mb-1">Fornecedor</label>
                                            <select name="idfornecedor" id="multiple-select" multiple="" class="form-control">
                                                <?php

                                                $empresa_fornecedor = "SELECT fornecedor.idfornecedor, fornecedor.nome FROM fornecedor
                                                INNER JOIN empresa_fornecedor ON empresa_fornecedor.idfornecedor=fornecedor.idfornecedor
                                                WHERE empresa_fornecedor.idempresa=$idempresa GROUP BY nome";
                                                $primeiro = mysqli_query($conecta, $empresa_fornecedor);

                                                if(mysqli_num_rows($primeiro) > 0){
                                                while($dado = mysqli_fetch_array($primeiro)){

                                                ?>
                                                <option name="idfornecedor" value="<?php echo $dado['idfornecedor']?>"><?php echo $dado['nome']?></option>
                                                <?php 
                                                }
                                                }?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                                        <span >Confirmar</span>
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>

    </div>
</body>
</html>
