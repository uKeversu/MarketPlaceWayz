<?php
	include 'conexao.php';
	session_start();
	$ids_user=$_SESSION['id_usuario'];

	$arquivos = $_FILES['arquivo'];
	
	if(isset($_FILES['arquivos'])){
                
		$arquivos = $_FILES['arquivos'];
	
		if($arquivos['error'])
			die("Falha ao enviar arquivo");
	
	
		if($arquivos['size'] > 2097152)
			die("Arquivo muito grande !! Max : 2MB");
	
	   $pasta = "perfilimg/";
	   $nomeDoArquivo = $arquivos['name'];
	   $novoNomeDoArquivo = uniqid();
	   $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
	
	   if($extensao != "jpg" && $extensao != 'png')
		die("Tipo de arquivo não aceito");
	
	   $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
	   
	   $deu_certo = move_uploaded_file($arquivos["tmp_name"], $path);
		if($deu_certo){
	
			
			
			mysqli_query($con,"update tb_usuario set nm_foto = '$nomeDoArquivo' , pathft = '$path' where id_usuario = '$ids_user'");

			
		echo"<script>alert('Inclusão realizada com sucesso');</script>";
		echo"<script>window.location='wallet.php'</script>";		

		}else{
		echo "<p>Falha ao enviar arquivo</p>";
		}
	}

	
?>	
	
	
	
	
	
	
	