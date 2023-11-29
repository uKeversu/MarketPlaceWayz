<?php

    include 'conexao.php';  

    session_start();
    $ids_user=$_SESSION['id_usuario'];

    $valorD =   $_POST['valorD'];
    $moeda_escolhida = $_POST['moeda_escolhida'];

    

    if($moeda_escolhida == 'ETH'){

        $result = mysqli_query($con,"select money_userE from tb_usuario where id_usuario = '$ids_user'");   
        $linha = mysqli_fetch_assoc($result);
        $fl = (float)implode(',', $linha);
        $fl1 = (float)$valorD;
        $money_userE = $fl+$fl1 ;
        
            mysqli_query($con,"UPDATE tb_usuario SET money_userE = '$money_userE' WHERE id_usuario = '$ids_user'");
            echo"<script>alert('Depósito Efetuado');</script>";
            echo"<script>window.location='wallet.php'</script>";
        
    }else if($moeda_escolhida == 'BITCOIN')  {

        $result = mysqli_query($con,"select money_userB from tb_usuario where id_usuario = '$ids_user'");   
        $linha = mysqli_fetch_assoc($result);
        $fl = (float)implode(',', $linha);
        $fl1 = (float)$valorD;
        $money_userB = $fl+$fl1 ;

            mysqli_query($con,"UPDATE tb_usuario SET money_userB = '$money_userB' WHERE id_usuario = '$ids_user'");
            echo"<script>alert('Depósito Efetuado');</script>";
            echo"<script>window.location='wallet.php'</script>";
        }         

?>