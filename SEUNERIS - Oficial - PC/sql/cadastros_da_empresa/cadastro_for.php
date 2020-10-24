
<?php

session_start();
include("../conecta.php");

$idempresa = $_POST['idempresa'];

$nome_vendedor = $_POST['nome_vendedor'];
$telefone = $_POST['telefone_vendedor'];
$email = $_POST['email_vendedor'];
$nome = $_POST['nome'];

$fornecedor = "INSERT INTO fornecedor(nome) VALUES ('$nome')";
$primeiro = mysqli_query($conecta, $fornecedor);

$vendedor = "INSERT INTO vendedor(nome) VALUES ('$nome_vendedor')";
$segundo = mysqli_query($conecta, $vendedor);

    $passa = "SELECT * FROM vendedor WHERE nome='$nome_vendedor'";
    $terceiro = mysqli_query($conecta,$passa);
    $dado = mysqli_fetch_array($terceiro);
    $idvendedor = $dado['idvendedor'];

    $pega = "SELECT * FROM fornecedor WHERE nome='$nome'";
    $quarto = mysqli_query($conecta,$pega);
    $inf = mysqli_fetch_array($quarto);
    $idfornecedor = $inf['idfornecedor'];

        $contatos = "INSERT INTO contato(telefone, email, idvendedor)VALUES ('$telefone', '$email', '$idvendedor')";
        $quinto = mysqli_query($conecta, $contatos);

            $empresa_fornecedor = "INSERT INTO empresa_fornecedor(idempresa, idfornecedor) VALUES ('$idempresa', '$idfornecedor')";
            $sexto = mysqli_query($conecta, $empresa_fornecedor);
                        
                $fornecedor_vendedor = "INSERT INTO fornecedor_vendedor(idfornecedor,idvendedor)VALUES ('$idfornecedor','$idvendedor')";
                $setimo = mysqli_query($conecta, $fornecedor_vendedor);

$conta = mysqli_affected_rows($conecta);
                
if ($conta >0) {
    header('location: ../../usuario/acesso_usuario/com_usuario/tela_de_registros/cadastro_dos_fornecedores/cadastro_for.php');
}else {
    header('location: ../../usuario/acesso_usuario/com_usuario/tela_de_registros/cadastro_dos_fornecedores/cadastro_for.php');
}
?>