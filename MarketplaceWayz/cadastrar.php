<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inclusão de cadastro</title>
	</head>
	<body>
	

	  <?php

		
		    /*
		include - Faz a inclusão do arquivo, permitindo executar a lógica do programa que se encontra neste arquivo
		
		*/
		include 'conexao.php';	
		/*
	     $_POST - É uma variável global que captura o conteúdo que está no formulário por meio da propriedade name		
		*/

		//Passando os dados que estão no formulário para as variáveis abaixo
		$cd_user      = $_POST['cd_user'];
		$cd_senha      = $_POST['cd_senha'];
        $cd_namec      = $_POST['cd_namec'];
        $cd_cpf      = $_POST['cd_cpf'];
        $cd_email      = $_POST['cd_email'];

		$arquivos = $_FILES['arquivos'];
	
		
		$result = mysqli_query($con,"select * from tb_usuario where cd_user = '$cd_user'");	
		$resultcpf = mysqli_query($con,"select * from tb_usuario where cd_cpf = '$cd_cpf'");	
		$resultemail = mysqli_query($con,"select * from tb_usuario where cd_email = '$cd_email'");	
		if(mysqli_num_rows ($result) > 0 ){
			echo"<script>alert('Usuario ja utilizado');</script>";
			echo"<script>window.location='cadastros.html'</script>";
		}
		if(mysqli_num_rows ($resultcpf) > 0 ){
			echo"<script>alert('CPF ja utilizado');</script>";
			echo"<script>window.location='cadastros.html'</script>";
		}
		if(mysqli_num_rows ($resultemail) > 0 ){
			echo"<script>alert('E-MAIL ja utilizado');</script>";
			echo"<script>window.location='cadastros.html'</script>";
		}
			if (empty($cd_user)) {
			echo"<script>alert('Preencha o campo Usuario corretamente');</script>";
			echo"<script>window.location='cadastros.html'</script>";

			}else if (empty($cd_senha)) {
				echo"<script>alert('Preencha o campo senha');</script>";
				echo"<script>window.location='cadastros.html'</script>"; 
				}
				else if (empty($cd_namec)) {
				echo"<script>alert('Preencha o campo Nome corretamente.');</script>";
				echo"<script>window.location='cadastros.html'</script>"; 
				}else if (empty($cd_cpf)) {
				echo"<script>alert('Preencha o campo CPF corretamente');</script>";
				echo"<script>window.location='cadastros.html'</script>"; 
				}else if (!filter_var($cd_email, FILTER_VALIDATE_EMAIL)) {
				echo"<script>alert('Preencha o E-MAIL corretamente');</script>";
				echo"<script>window.location='cadastros.html'</script>"; 
				}

                
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
                
                        
                        
                        mysqli_query($con,"insert into tb_usuario(cd_user, cd_senha, cd_namec, cd_cpf, cd_email, nm_foto, pathft)
			values('$cd_user','$cd_senha','$cd_namec','$cd_cpf','$cd_email','$nomeDoArquivo','$path')");

                        
                    echo"<script>alert('Inclusão realizada com sucesso');</script>";
			echo"<script>window.location='index.html'</script>";		
			
                    }else{
                    echo "<p>Falha ao enviar arquivo</p>";
                    }
                }
			
?>
</body>
</html>		
			
		
		