<?php 

include 'conexao.php';  

session_start();
$ids_user=$_SESSION['id_usuario'];

$valorS =   $_POST['valorS'];
$moeda_escolhida = $_POST['moeda_escolhida'];



if($moeda_escolhida == 'ETH'){

    $result = mysqli_query($con,"select money_userE from tb_usuario where id_usuario = '$ids_user'");   
    $linha = mysqli_fetch_assoc($result);
    $recebe = implode(',', $linha);

    if ($recebe >= $valorS){
    $money_userE = implode(',', $linha) - $valorS;

        mysqli_query($con,"UPDATE tb_usuario SET money_userE = '$money_userE' WHERE id_usuario = '$ids_user'");
        echo"<script>alert('Saque Efetuado');</script>";
        echo"<script>window.location='wallet.php'</script>";
    } else{
        echo"<script>alert('Saque Não Efetuado , valor indisponivel para saque');</script>";
        echo"<script>window.location='wallet.php'</script>";
    } 
       
}else if($moeda_escolhida == 'BITCOIN')  {

    $result = mysqli_query($con,"select money_userB from tb_usuario where id_usuario = '$ids_user'");   
    $linha = mysqli_fetch_assoc($result);
    $recebe = implode(',', $linha);

    if ($recebe >= $valorS){
    $money_userB = implode(',', $linha) - $valorS;

        mysqli_query($con,"UPDATE tb_usuario SET money_userB = '$money_userB' WHERE id_usuario = '$ids_user'");
        echo"<script>alert('Saque Efetuado');</script>";
        echo"<script>window.location='wallet.php'</script>";
    } else{
        echo"<script>alert('Saque Não Efetuado , valor indisponivel para saque');</script>";
        echo"<script>window.location='wallet.php'</script>";
    }       
}
?>