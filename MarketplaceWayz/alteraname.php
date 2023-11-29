<?php
	include 'conexao.php';
	session_start();
	$ids_user=$_SESSION['id_usuario'];

	$cd_user      = $_POST['name'];
	
	
    $result = mysqli_query($con,"select * from tb_usuario where cd_user = '$cd_user'");

    if(mysqli_num_rows ($result) > 0 ){
        echo"<script>alert('Usuario ja utilizado');</script>";
        echo"<script>window.location='wallet.php'</script>";
    }else if (empty($cd_user)) {
        echo"<script>alert('Preencha o campo Usuario corretamente');</script>";
        echo"<script>window.location='wallet.php'</script>";

        }else {
            mysqli_query($con,"update tb_usuario set cd_user = '$cd_user' where id_usuario = '$ids_user'");
            echo"<script>window.location='wallet.php'</script>";
        }
?>	
	