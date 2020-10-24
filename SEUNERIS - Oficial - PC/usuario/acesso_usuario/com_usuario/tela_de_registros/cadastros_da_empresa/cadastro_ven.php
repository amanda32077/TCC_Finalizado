<!DOCTYPE html>
<html lang="en">

<head>
    <title>Produtos Vendidos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../../../style/css/bootstrap.min.css">
</head>

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
  background-color: rgb(3, 3, 121); 
  color:white;
}
.btn-primary:hover{
  background-color: rgb(3, 3, 121); 
  color:white;
}
.btn-primary:enabled{
  background-color: rgb(3, 3, 121); 
  color:white;
}
.bordas{
  border: 2px solid rgb(3, 3, 121);
  height: 34px;
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

<body style="background-color: #ececf6;">
  <div class="container col-7">
    <div class="card" style="margin-top: 10%">
      <div class="card-header" style="background-color: rgb(3, 3, 121); color:white">Produtos Vendidos
        <a href="../../index.php" class="btn seg float-right">Voltar</a>  
      </div>
      <div class="card-body text-center">
        <div class="row form-group col-md-12">
          <form method="POST" action="../../../../../sql/cadastros_da_empresa/cadastra_ven.php" class="col-md-12" style="display: flex;"> 
            <input type="hidden" name="idempresa" value="<?php echo $idempresa?>">
            <input type="hidden" name="idvenda" value="<?php echo $idvenda?>">
            
            <select name="idproduto" class="col-md-8 bordas">
              <?php                     
                $busca = "SELECT descricao, idproduto  FROM produto WHERE idempresa='$idempresa' and produto.quantidade!=0 ORDER BY descricao";
                $sql = mysqli_query($conecta,$busca);
                  if(mysqli_num_rows($sql) > 0){
                    while($dados = mysqli_fetch_array($sql)){
              ?> 
                <option value="<?php echo $dados['idproduto']?>"><?php echo $dados['descricao']?></option>
              <?php   
                  }
                }
              ?>
            </select>
            <input type="number" name="quantidade" value="" placeholder="Quantd." class="bordas col-md-2">
            <input type="submit" class="bordas col-md-2" style="background-color: rgb(3, 3, 121); color: white;"></input>
        </form>
        </div>
      <a href="../cadastros_da_empresa/finaliza_ven.php"  class="btn btn-primary" style="margin-top:5%; background-color:rgb(3, 3, 121); border: 1px solid rgb(3, 3, 121);">Finalizar Venda</a>
      </div>
    </div>                  
  </div>
</body>
</html>
<!-- end document-->
