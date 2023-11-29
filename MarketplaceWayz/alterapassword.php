<?php
	include 'conexao.php';
	session_start();
	$ids_user=$_SESSION['id_usuario'];

	$cd_senha      = $_POST['password'];
	

    if (empty($cd_senha)) {
        echo"<script>alert('Preencha o campo senha');</script>";
        echo"<script>window.location='wallet.php'</script>"; 
        }else {
            mysqli_query($con,"update tb_usuario set cd_senha = '$cd_senha' where id_usuario = '$ids_user'");
            echo"<script>window.location='wallet.php'</script>";
        }
?>	