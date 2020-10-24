<!doctype html>
<html lang="pt-br">
 
<head>
    <title>SeuNeris</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../../style/css/style.css">
    <link rel="stylesheet" href="../../../style/css-index/style.css">
    <link rel="stylesheet" href="../../../style/css/font_pp.css">
    <link rel="stylesheet" href="../../../style/css/style_pp.css">
    <link rel="stylesheet" href="../../../style/css/boots_pp.css">

</head>

<style>
.adi{
    color: white;
    background-color: rgb(228, 167, 25);
}
.adi:hover {
  color: rgb(228, 167, 25);
  background-color: white;
}
.pri{
    color: red;
    background-color: white;
}
.pri:hover {
  color: white;
  background-color: red;
}
.btn{
    margin-bottom: 1px;
}
.seg{
    color: rgb(3, 3, 121);
    background-color: white;
}
.seg:hover{
    color: white;
    background-color: rgb(3, 3, 121);
}
.cabeca{
        color: rgba(53, 53, 53, 0.883);
}
.btn-primary{
        color: white;
        background-color: rgb(3, 3, 121);
    }
.btn-primary:hover{
    color: rgb(3, 3, 121);
    background-color: white;
}
h2{
    color: rgb(3, 3, 121);
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
include "../../../sql/conecta.php";
?>

<body>    
    <div class="dashboard-header">
        <nav class="navbar bg-white col-md-12">
            <a class="navbar-brand col-md-6" style="color: rgb(3, 3, 121);" href="index.php">SeuNeris</a>
            <a href="../../../sql/usuario/logout.php" clas="navbar-brand col-md-6"><img src="../../../style/css-index/images.png" style="float: right; margin-right: 10px;" width="17%"></a>
        </nav>
    </div>  

                <?php
                    $empresa = "SELECT * FROM empresa WHERE idempresa='$idempresa'";
                    $primeiro = mysqli_query($conecta, $empresa);
                    $dono = mysqli_fetch_array($primeiro);
                ?>

                <br>
                <div class="tab-regular">
                    <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active cabeca" id="home-tab-justify" data-toggle="tab" href="#vendidos-justify" role="tab" aria-controls="home" aria-selected="true"><h5 class="cabeca">Vendas</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="home-tab-justify" data-toggle="tab" href="#estoque-justify" role="tab" aria-controls="home" aria-selected="true"><h5 class="cabeca">Estoque</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#repor-justify" role="tab" aria-controls="profile" aria-selected="false"><h5 class="cabeca">Reposição</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab-justify" data-toggle="tab" href="#empresa-justify" role="tab" aria-controls="contact" aria-selected="false"><h5 class="cabeca">Fornecedores</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab-justify" data-toggle="tab" href="#data-justify" role="tab" aria-controls="contact" aria-selected="false"><h5 class="cabeca">Agenda</h5></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent7" >
                        <div class="tab-pane fade show active " id="vendidos-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                                    <table class="table">
                                    <tr>
                                    <th><h2> Lista de Produtos Vendidos  </h2></th>
                                    </tr>
                                    </table>
                                    <br>
                                    <div class="table-responsive">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                    <?php
                                                        include('../../../sql/conecta.php');

                                                        if (isset($_SESSION['idvenda'])) {
                                                            $idvenda=$_SESSION['idvenda']; 
                                                        }else{
                                                            $mensagem="Insira a data de HOJE";
                                                            $hidden="hidden";
                                                        ?>
                                                        
                                                        <a href="tela_de_registros/cadastros_da_empresa/data_ven.php" class="alert alert-danger col-md-4" style="color:red; font-size: 24px; margin-left: 40%;"><?php echo $mensagem?></a>

                                                    <?php
                                                    }
                                                        include('../../../sql/conecta.php');
                                                        $iddata = "SELECT venda.data_venda , sum(produto_venda.quantidade) as quantidade, sum(produto_venda.preco*produto_venda.quantidade) as valor_total
                                                        FROM produto_venda 
                                                        INNER JOIN venda ON venda.idvenda=produto_venda.idvenda 
                                                        WHERE venda.idempresa=$idempresa GROUP BY data_venda";
                                                        $segundo = mysqli_query($conecta, $iddata);

                                                        if(mysqli_num_rows($segundo) > 0){
                                                        while($venda = mysqli_fetch_array($segundo)){
                                                    ?>
                                                    <th>
                                                        <div class="card campaign-card text-center" style="padding:30px; margin-top:20px;">
                                                            <div class="card-body">
                                                                <div class="rounded-circle card-body"><a href="tela_visualizar_informacao/produto_ven.php?data=<?php echo $venda['data_venda']?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#666666"><path d="M96.32,0c-2.06937,0 -3.44,1.37063 -3.44,3.44v27.52c0,2.06938 1.37063,3.44 3.44,3.44h10.32v3.44h-24.08v-17.2c0,-1.89469 -1.54531,-3.44 -3.44,-3.44h-44.72c-0.1075,0 -0.215,0 -0.3225,0c-1.77375,0.16125 -3.13094,1.65281 -3.1175,3.44v17.2h-6.235c-3.78937,0 -9.97062,1.3975 -12.04,11.7175l-12.685,82.8825h172l-12.685,-83.205c-1.72,-9.97062 -8.25062,-11.395 -12.04,-11.395h-13.115v-3.44h10.32c2.06938,0 3.44,-1.37062 3.44,-3.44v-27.52c0,-2.06937 -1.37062,-3.44 -3.44,-3.44zM37.84,24.08h37.84v55.04h-37.84zM44.72,34.4v6.88h24.08v-6.88zM44.72,48.16v6.88h24.08v-6.88zM100.0825,51.6h38.5925c3.78938,0 7.525,3.09063 7.525,6.88l1.72,12.3625c0.34938,2.06938 -0.04031,4.11188 -1.075,5.4825c-1.37062,1.72 -3.07719,2.795 -5.4825,2.795h-40.9575c-4.12531,0 -7.525,-3.39969 -7.525,-7.525v-12.7925c0,-4.12531 3.07719,-7.2025 7.2025,-7.2025zM44.72,61.92v6.88h24.08v-6.88zM96.32,86.3225h7.2025c1.72,0 3.1175,1.3975 3.1175,3.1175v7.2025c0,1.72 -1.3975,3.1175 -3.1175,3.1175h-7.2025c-1.72,0 -3.1175,-1.3975 -3.1175,-3.1175v-7.2025c0,-1.72 1.3975,-3.1175 3.1175,-3.1175zM116.96,86.3225h7.2025c1.72,0 3.1175,1.3975 3.1175,3.1175v7.2025c0,1.72 -1.3975,3.1175 -3.1175,3.1175h-7.2025c-1.72,0 -3.1175,-1.3975 -3.1175,-3.1175v-7.2025c0,-1.72 1.3975,-3.1175 3.1175,-3.1175zM137.6,86.3225h7.2025c1.72,0 3.1175,1.3975 3.1175,3.1175v7.2025c0,1.72 -1.3975,3.1175 -3.1175,3.1175h-7.2025c-1.72,0 -3.1175,-1.3975 -3.1175,-3.1175v-7.2025c0,-1.72 1.3975,-3.1175 3.1175,-3.1175zM96.32,106.9625h7.2025c1.72,0 3.1175,1.3975 3.1175,3.1175v7.2025c0,1.72 -1.3975,3.1175 -3.1175,3.1175h-7.2025c-1.72,0 -3.1175,-1.3975 -3.1175,-3.1175v-7.2025c0,-1.72 1.3975,-3.1175 3.1175,-3.1175zM116.96,106.9625h7.2025c1.72,0 3.1175,1.3975 3.1175,3.1175v7.2025c0,1.72 -1.3975,3.1175 -3.1175,3.1175h-7.2025c-1.72,0 -3.1175,-1.3975 -3.1175,-3.1175v-7.2025c0,-1.72 1.3975,-3.1175 3.1175,-3.1175zM137.6,106.9625h7.2025c1.72,0 3.1175,1.3975 3.1175,3.1175v7.2025c0,1.72 -1.3975,3.1175 -3.1175,3.1175h-7.2025c-1.72,0 -3.1175,-1.3975 -3.1175,-3.1175v-7.2025c0,-1.72 1.3975,-3.1175 3.1175,-3.1175zM0,135.88v24.08c0,6.88 5.16,12.04 12.04,12.04h147.92c6.88,0 12.04,-5.16 12.04,-12.04v-24.08zM86,144.48c3.78938,0 6.88,3.09063 6.88,6.88c0,3.78938 -3.09062,6.88 -6.88,6.88c-3.78937,0 -6.88,-3.09062 -6.88,-6.88c0,-3.78937 3.09063,-6.88 6.88,-6.88z"></path></g></g></svg></a></div>
                                                                    <div class="campaign-info">
                                                                        <h3 class="mb-1">Valor Total: <?php echo number_format($venda['valor_total'], 2, ',', ' ')?> </h3>
                                                                        <p class="mb-3">Total Produtos Vendidos : <?php echo $venda['quantidade']?></p>
                                                                        <p>Data : <span class="text-dark font-medium ml-2"><?php echo date('d/m/Y', strtotime($venda['data_venda']))?></span></p> 
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    
                                                <?php
                                                        }
                                                    }
                                                ?>   
                                                    <th>
                                                        <div class="campaign-card text-center" style="padding:30px; visibility: <?php echo $hidden?>;">
                                                            <div class="card-body">
                                                                <div class="rounded-circle card-body"><a href="../com_usuario/tela_de_registros/cadastros_da_empresa/cadastro_ven.php"><p style="font-size: 50px; color: rgb(3, 3, 121)">+</p></a></div>                                                                        
                                                            </div>
                                                        </div>
                                                    </th>                                           
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>      
                                </div>
                                <div class="tab-pane fade" id="estoque-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                                        <table class="table">
                                            <tr>
                                                <th><h2> Produtos Comercializados pela Empresa </h2> </th>
                                                <th><a href="tela_de_registros/cadastros_da_empresa/cadastro_pro.php" ><button class="card btn adi float-right">Adicionar Produto</button></a></th>
                                            </tr>
                                        </table>
                                        <br>
                                        
                                        <div class="table-responsive">
                                            <table >
                                                <tbody>
                                                    <tr>
                                                    
                                                <?php
                                                
                                                    $produto = "SELECT tipo.descricao FROM tipo
                                                    INNER JOIN produto ON produto.idtipo=tipo.idtipo
                                                    WHERE produto.idempresa=$idempresa and produto.quantidade!=0 GROUP BY descricao";
                                                    $terceiro = mysqli_query($conecta, $produto);

                                                        if(mysqli_num_rows($terceiro) > 0){
                                                        while($produto = mysqli_fetch_array($terceiro)){
                                                ?>

                                                        <th>
                                                        <div class="row text-center pad-top" >
                                                            <div class="div-square" style="text-align:center;padding:60px;">
                                                                <a href="tela_visualizar_informacao/produto_est.php?tipo=<?php echo $produto['descricao']?>"><img src="https://img.icons8.com/material-two-tone/60/000000/view-file.png">
                                                                <h4><?php echo $produto['descricao']?></h4>
                                                                </a>                      
                                                            </div>
                                                        </div>
                                                        </th>  
                                                                                                                                                     
                                                <?php
                                                        }
                                                    }
                                                ?> 
                                                    </tr>   
                                                </tbody>
                                            </table>
                                        </div>       
                                    </div>
                                    <div class="tab-pane fade" id="repor-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                                            <table class="table">
                                                    <tr>
                                                    <th><h2> Produtos Em Falta ou Para Repor </h2></th>
                                                    </tr>
                                                    </table>
                                                    <br>
                                                                        <div class="card">
                                                                            <div class="card-body p-0">
                                                                                <div class="table-responsive">
                                                                                    <table class="table">
                                                                                        <thead class="bg-light">
                                                                                            <tr class="border-0" style="background-color:rgb(228, 167, 25);">
                                                                                                <th class="border-0" style="color:white">Produto</th>
                                                                                                <th class="border-0" style="color:white">Quantidade Atual</th>
                                                                                                <th class="border-0" style="color:white">Fornecedor</th>
                                                                                                <th class="border-0"></th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                                <?php
                                                                                                    $produto_reposicao="SELECT produto.idproduto, produto.descricao, produto.quantidade, fornecedor.nome FROM produto 
                                                                                                    INNER JOIN fornecedor ON fornecedor.idfornecedor=produto.idfornecedor
                                                                                                    WHERE produto.idempresa=$idempresa and (produto.quantidade_minima/3)>produto.quantidade";
                                                                                                    $quarto=mysqli_query($conecta,$produto_reposicao);

                                                                                                    if(mysqli_num_rows($quarto) > 0){
                                                                                                        while($repor = mysqli_fetch_array($quarto)){
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $repor['descricao']?></td>
                                                                                                    <td><?php echo $repor['quantidade']?></td>
                                                                                                    <td><?php echo $repor['nome']?></td>
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
                                               
                                    </div>
                                    <div class="tab-pane fade" id="empresa-justify" role="tabpanel" aria-labelledby="contact-tab-justify">
                                            <table class="table">
                                                    <tr>
                                                    <th><h2> Fornecedores</h2></th>
                                                    <th><a href="tela_de_registros/cadastro_dos_fornecedores/cadastro_for.php"><button class="card btn adi float-right">Adicionar Fornecedor</button></a></th>
                                                    </tr>
                                                    </table>
                                                    <br>



                                                    <div class="card">
                                                                            <div class="card-body p-0">
                                                                                <div class="table-responsive">
                                                                                    <table class="table">
                                                                                        <thead class="bg-light">
                                                                                            <tr class="border-0" style="background-color:rgb(228, 167, 25);">
                                                                                                <th class="border-0" style="color:white">Fornecedor</th>
                                                                                                <th class="border-0" style="color:white">Vendedor</th>
                                                                                                <th class="border-0" style="color:white">e-mail</th>
                                                                                                <th class="border-0" style="color:white">Telefone</th>
                                                                                                <th class="border-0"></th>
                                                                                                <th class="border-0"></th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                                     <?php
                                                    
                                                                                                    $fornecedor = "SELECT fornecedor.idfornecedor, fornecedor.nome,
                                                                                                    contato.email, contato.telefone, vendedor.nome as vendedor FROM fornecedor 
                                                                                                    INNER JOIN empresa_fornecedor ON empresa_fornecedor.idfornecedor=fornecedor.idfornecedor 
                                                                                                    INNER JOIN fornecedor_vendedor ON fornecedor_vendedor.idfornecedor=fornecedor.idfornecedor
                                                                                                    INNER JOIN vendedor ON vendedor.idvendedor=fornecedor_vendedor.idvendedor
                                                                                                    INNER JOIN contato ON contato.idvendedor=vendedor.idvendedor 
                                                                                                    WHERE empresa_fornecedor.idempresa=$idempresa group by nome";
                                                                                                    $quinto = mysqli_query($conecta, $fornecedor);

                                                                                                        if(mysqli_num_rows($quinto) > 0){
                                                                                                        while($fornecedor = mysqli_fetch_array($quinto)){
                                                                                                    ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $fornecedor['nome']?></td>
                                                                                                    <td><?php echo $fornecedor['vendedor']?></td>
                                                                                                    <td><?php echo $fornecedor['email']?></td>
                                                                                                    <td><?php echo $fornecedor['telefone']?></td>
                                                                                                    <td ><a href="../../../sql/crud/deleta_forn.php?idfornecedor=<?php echo $fornecedor['idfornecedor']?>" class="card btn pri">Apagar</a></td>
                                                                                                    <td ><a href="tela_de_edicoes/edit_forn.php?idfornecedor=<?php echo $fornecedor['idfornecedor']?>" class="card btn seg">Editar</a></td>
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
                                    </div>
                                    <div class="tab-pane fade" id="data-justify" role="tabpanel" aria-labelledby="contact-tab-justify">
                                        <table class="table">
                                                <tr>
                                                <th><h2> Calendário de Datas </h2></th>
                                                <th><a href="tela_de_registros/cadastros_da_empresa/cadastro_age.php"><button class="card btn adi float-right">Adicionar Evento</button></a></th>
                                                </tr>
                                                </table>
                                                <br>     
                                           
                                                <div class="card">
                                                    <div class="card-body p-0">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="bg-light">
                                                                    <tr class="border-0" style="background-color:rgb(228, 167, 25);">
                                                                        <th class="border-0" style="color:white">Evento</th>
                                                                        <th class="border-0" style="color:white">Data</th>
                                                                        <th class="border-0"></th>
                                                                        <th class="border-0"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <?php
                                                                            $agenda="SELECT * FROM agenda WHERE idempresa = $idempresa order by data";
                                                                            $quarto=mysqli_query($conecta,$agenda);

                                                                            if(mysqli_num_rows($quarto) > 0){
                                                                                while($doc = mysqli_fetch_array($quarto)){
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $doc['descricao']?></td>  
                                                                            <td><?php echo date('d/m/Y', strtotime($doc['data']))?></td>
                                                                            <td ><a href="../../../sql/crud/deleta_age.php?idagenda=<?php echo $doc['idagenda']?>" class="card btn pri">Apagar</a></td>
                                                                            <td ><a href="tela_de_edicoes/edit_age.php?idagenda=<?php echo $doc['idagenda']?>" class="card btn seg">Editar</a></td>
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
                       
                                </div>
                            </div>
                            
    <script src="../../../style/js/jquery-3.3.1.min.js"></script>
    <script src="../../../style/js/bootstrap.bundle.js"></script>
    <script src="../../../style/js/jquery.slimscroll.js"></script>
    <script src="../../../style/js/main-js.js"></script>                       
</body>
</html>