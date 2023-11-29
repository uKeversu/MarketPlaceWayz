<?php 

include 'conexao.php';
    session_start();
    $id_user=$_SESSION['id_usuario'];
    $id_nft      = $_POST['id_nft'];
    $moeda_nft = $_POST['moeda_nft'];
    $vlr_nft = $_POST['vlr_nft'];
    $ids_vend = $_POST['ids_vend'];

    if($moeda_nft == 'ETH'){
        $result = mysqli_query($con,"select money_userE from tb_usuario where id_usuario = '$id_user'");    
        $linha = mysqli_fetch_assoc($result);
        $recebe = (float)implode(',', $linha);

        $resultid = mysqli_query($con,"select money_userE from tb_usuario where id_usuario = '$ids_vend'"); 
        $linhaid = mysqli_fetch_assoc($resultid);
        $recebeid = (float)implode(',', $linhaid);

        if($vlr_nft>$recebe){
            echo"<script>alert('Dinheiro insuficiente');</script>";
            echo"<script>window.location='home.php'</script>";
        }else{
            $vlr_retirado = $recebe - $vlr_nft;

            $vlr_soma = $recebeid + $vlr_nft;

            mysqli_query($con,"update tb_usuario set money_userE = '$vlr_retirado' where id_usuario = '$id_user'");

            mysqli_query($con,"update tb_usuario set money_userE = '$vlr_soma' where id_usuario = '$ids_vend'");

            mysqli_query($con,"insert into tb_compras(ids_userc, ids_nfts)
            values('$id_user','$id_nft')");

            mysqli_query($con,"update tb_nfts set ids_user = '$id_user' where id_nft = '$id_nft'");

            echo"<script>window.location='home.php'</script>";
        }

    }else if($moeda_nft == 'BITCOIN'){
        $result = mysqli_query($con,"select money_userB from tb_usuario where id_usuario = '$id_user'");    
        $linha = mysqli_fetch_assoc($result);
        $recebe = (float)implode(',', $linha);
        

        $resultid = mysqli_query($con,"select money_userB from tb_usuario where id_usuario = '$ids_vend'"); 
        $linhaid = mysqli_fetch_assoc($resultid);
        $recebeid = (float)implode(',', $linhaid);


        if($vlr_nft>$recebe){
            echo"<script>alert('Dinheiro insuficiente');</script>";
            echo"<script>window.location='home.php'</script>";
        }else{
            $vlr_retirado = $recebe - $vlr_nft;

            $vlr_soma = $recebeid + $vlr_nft;

            mysqli_query($con,"update tb_usuario set money_userB = '$vlr_retirado' where id_usuario = '$id_user'");

            mysqli_query($con,"update tb_usuario set money_userB = '$vlr_soma' where id_usuario = '$ids_vend'");

            mysqli_query($con,"insert into tb_compras(ids_userc, ids_nfts)
            values('$id_user','$id_nft')");

            mysqli_query($con,"update tb_nfts set ids_user = '$id_user' where id_nft = '$id_nft'");

            echo"<script>window.location='home.php'</script>";
        }

    }
    
    



    

   
?>