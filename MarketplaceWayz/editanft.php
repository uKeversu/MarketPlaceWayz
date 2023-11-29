<?php 
include 'conexao.php';
session_start();
$id_user=$_SESSION['id_usuario'];

$id_nft      = $_POST['id_nft'];
$vlr_nft = $_POST['vlr_nft'];

if (empty($vlr_nft)) {
    echo"<script>alert('Preencha o campo Valor corretamente.');</script>";
    echo"<script>window.location='account-page.php'</script>"; 
    }else{
        mysqli_query($con,"update tb_nfts set vlr_nft = '$vlr_nft' where id_nft = '$id_nft'");
        echo"<script>window.location='account-page.php'</script>"; 
    }
?>