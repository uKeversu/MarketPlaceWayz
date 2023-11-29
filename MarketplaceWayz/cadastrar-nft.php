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
		session_start();
		$ids_user=$_SESSION['id_usuario'];


		$desc_nft      = $_POST['desc_nft'];
		$col_nft      = $_POST['col_nft'];
        $vlr_nft      = $_POST['vlr_nft'];
		$moeda_nft 	 = $_POST['moeda_nft'];
		$edicao_nft	 = $_POST['edicao_nft'];
        $cat_nft      = $_POST['cat_nft'];
        $arquivo = $_FILES['arquivo'];
       
	
		
		
		
			if (empty($desc_nft)) {
			echo"<script>alert('Preencha o campo Nome corretamente');</script>";
			echo"<script>window.location='creator-page.php'</script>";

			}else if (empty($col_nft)) {
				echo"<script>alert('Preencha o campo Colecao');</script>";
				echo"<script>window.location='creator-page.php'</script>"; 
				}
				else if (empty($vlr_nft)) {
				echo"<script>alert('Preencha o campo Valor corretamente.');</script>";
				echo"<script>window.location='creator-page.php'</script>"; 
				}else if (empty($cat_nft)) {
				echo"<script>alert('Preencha o campo Categoria corretamente');</script>";
				echo"<script>window.location='creator-page.php'</script>"; 
                }
                else if(isset($_FILES['arquivo'])){
                
                    $arquivo = $_FILES['arquivo'];
                
                    if($arquivo['error'])
                        die("Falha ao enviar arquivo");
                
                
                    if($arquivo['size'] > 2097152)
                        die("Arquivo muito grande !! Max : 2MB");
                
                   $pasta = "img/";
                   $nomeDoArquivo = $arquivo['name'];
                   $novoNomeDoArquivo = uniqid();
                   $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
                
                   if($extensao != "jpg" && $extensao != 'png')
                    die("Tipo de arquivo não aceito");
                
                   $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
                   
                   $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
                    if($deu_certo){
                
                        
                        
                        mysqli_query($con,"insert into tb_nfts(nm_nft, path, desc_nft, col_nft, vlr_nft, moeda_nft, edicao_nft, cat_nft, ids_user)
			values('$nomeDoArquivo', '$path','$desc_nft','$col_nft','$vlr_nft','$moeda_nft','$edicao_nft','$cat_nft','$ids_user')");	
                        
                        
                    echo "<p>Arquivo enviado com sucesso!</p>";
                    }else{
                    echo "<p>Falha ao enviar arquivo</p>";
                    }
                }
			echo"<script>alert('Inclusão realizada com sucesso');</script>";
			echo"<script>window.location='creator-page.php'</script>";		
			
?>
</body>
</html>		
		