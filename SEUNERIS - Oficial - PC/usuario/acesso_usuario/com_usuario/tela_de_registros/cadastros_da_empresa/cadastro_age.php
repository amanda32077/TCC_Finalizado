<!DOCTYPE html>
<html lang="en">

<head>
    <title>Agenda SeuNeris</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../../../style/css/bootstrap.min.css">
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
</style>
    
    <?php
    session_start();
    
    if (isset($_SESSION['idempresa'])) {
        $idempresa= $_SESSION['idempresa'];
    }else {
        echo "LOGIN NÃO EFETUADO";
        exit;
    }
    
    include "../../../../../sql/conecta.php";
    ?>
    
    <body style="background-color: #ececf6;">
    
    <div class="container col-md-6">
    <div class="card" style="margin-top: 20%;">
        <div class="card-header" style=" background-color: rgb(228, 167, 25); color:white;">Cadastro de Eventos
            <a href="../../index.php" class="btn seg float-right">Voltar</a>
        </div>
        <div class="card-body">
            <form action="../../../../../sql/cadastros_da_empresa/cadastro_age.php" method="post" novalidate="novalidate">
            <input type="hidden" name="idempresa" value="<?php echo $idempresa?>">
                <div class="row form-group col-md-12">
                    <div class="col-md-8" style="margin-bottom:20px">
                        <label for="descricao" class="control-label mb-6">Evento</label>
                        <input name="descricao" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="data_age" class="control-label mb-1">Data</label>
                        <input id="cc-exp" name="data_age" type=date class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                data-val-cc-exp="Please enter a valid month and year" placeholder="dia / mes/ anp"
                                autocomplete="cc-exp">
                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                    </div> 
                </div>
                <button  type="submit" class="btn btn-info btn-block" style="margin-top:20px;  background-color:rgb(228, 167, 25); border: 1px solid rgb(228, 167, 25);"> 
                    <span >Confirmar</span>
                </button>
        </div>
                
            </form>
        </div>
    </div>
    </body>
    </html>
    <!-- end document-->
    