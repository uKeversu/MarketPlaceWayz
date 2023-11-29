<?php
    session_start();
	$cd_user = $_POST['cd_user'];
	$cd_senha = $_POST['cd_senha'];
	
	// A include carrega o arquivo conexao.php
	include 'conexao.php';
	
	$result = mysqli_query($con,"select id_usuario,cd_user,cd_senha from tb_usuario where cd_user = '$cd_user' and cd_senha = '$cd_senha'");
	
	/* Logo abaixo tem um bloco com if e else, verificando se a variável $result foi bem sucedida, 
	ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, 
	se não, se não tiver registros seu valor será 0. */
	/*
	mysqli_num_rows - É a função que retorna o nr de linhas de um result set	
	*/

	if(mysqli_num_rows ($result) > 0 ) { 
		$reg_cadastro=mysqli_fetch_array($result);
		$_SESSION['txtnome']   = $cd_user; 
		$_SESSION['txtsenha']  = $cd_senha; 
		$_SESSION['id_usuario']= $reg_cadastro['id_usuario'];
		/*
		isset - É a função que retorna verdadeiro se a variável existe
		*/
		if(isset($_SESSION['txtnome'])){	
					
				header('location:home.php'); 
			}
	
	} 
	else{ 	    
		/*
	     unset - É a função que destroi a variável de sessão		
		*/
		echo"<script>alert('Usuario ou Senha incorretos');</script>";
		echo"<script>window.location='index.html'</script>";
		unset ($_SESSION['txtnome']); 
		unset ($_SESSION['txtsenha']);
		
	}

?>		
