<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../../style/css/bootstrap.min.css">
    <title>Fornecedores SeuNeris</title>
</head>

<?php
include "../../../../sql/conecta.php";
session_start();
if (isset($_SESSION['idempresa'])) {
    $idempresa= $_SESSION['idempresa'];
}else {
    echo "LOGIN NÃO EFETUADO";
    exit;
}

    $idfornecedor=$_GET['idfornecedor'];

    $busca= "SELECT fornecedor.nome as fornecedor, vendedor.nome as vendedor, contato.telefone, contato.email FROM fornecedor
    INNER JOIN empresa_fornecedor ON fornecedor.idfornecedor=empresa_fornecedor.idfornecedor
    INNER JOIN empresa ON empresa.idempresa= empresa_fornecedor.idempresa
    INNER JOIN fornecedor_vendedor ON fornecedor.idfornecedor=fornecedor_vendedor.idfornecedor
    INNER JOIN vendedor ON vendedor.idvendedor=fornecedor_vendedor.idvendedor
    INNER JOIN contato ON vendedor.idvendedor=contato.idvendedor   
    WHERE fornecedor.idfornecedor=$idfornecedor and empresa.idempresa=$idempresa";
    $teste= mysqli_query($conecta, $busca);
    $result=mysqli_fetch_array($teste);

?>

<style> 
    .seg{
      color: rgb(3, 3, 121);
      background-color: white;
      border: 1px solid rgb(3, 3, 121) ;
    }
    .seg:hover{
      color: white;
      background-color: rgb(3, 3, 121);
    }
    .btn-primary{
        color: white;
        background-color: rgb(228, 167, 25);
        border: 1px solid rgb(228, 167, 25);
    }
    .btn-primary:hover{
        color: rgb(228, 167, 25);
        background-color: white;
        border: 1px solid rgb(228, 167, 25);
    }
</style>

<body style="background-color: #ececf6; font-family: 'Times New Roman', Times, serif;">
    <div class="container">
        <div class="card" style="margin-top: 10%">
                        <div class="card-header" style=" background-color: rgb(3, 3, 121); color:white">Cadastro de Fornecedor
                            <a href="../index.php" class="btn seg float-right">Voltar</a>
                        </div>
                        <div class="card-body">
                            <form action="../../../../sql/crud/edit_forn.php" method="post" novalidate="novalidate">
                            <input type="hidden" name="idempresa" value="<?php echo $idempresa?>">
                            <input type="hidden" name="idfornecedor" value="<?php echo $idfornecedor?>">
                            <div class="row form-group col-md-12">
                                <div class="row form-group col-md-6" style="display:inline-table">
                                    <div class="col-md-12">
                                        <label for="nome" class="control-label mb-6">Fornecedor</label>
                                        <input name="nome" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $result['fornecedor']?>">
                                    </div>    
                                    <br>
                                    <div class="col-md-6" style="float: right;">
                                        <label for="telefone_vendedor" class="control-label mb-1">Telefone</label>
                                        <input id="cc-name" name="telefone_vendedor" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $result['telefone']?>">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row form-group col-md-6" style="display:inline-table">
                                    <div class="col-md-12">
                                        <label for="nome_vendedor" class="control-label mb-6">Vendedor</label>
                                        <input name="nome_vendedor" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $result['vendedor']?>">
                                    </div>    
                                    <br>
                                    <div class="col-md-7" style="float: left;">
                                        <label for="email_vendedor" class="control-label mb-1">Email</label>
                                        <input id="cc-name" name="email_vendedor" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $result['email']?>">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                            </div>
                                <br>
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
