<?php 

include 'conexao.php';
session_start();
$id_user=$_SESSION['id_usuario'];

    mysqli_query($con,"delete from tb_usuario  where id_usuario = '$id_user'");
        echo"<script>alert('Conta excluída com sucesso');</script>";
            echo"<script>window.location='index.html'</script>";
?>