<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wayz - Recover password</title>
  <link rel="stylesheet" href="css/recupera.css" />

  <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
  <link rel="manifest" href="img/favicon/site.webmanifest">
  <!--
      BOOTSTRAP
    -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!--
      ICONE
    -->
  <link href="https://css.gg/css?=|eye|facebook|google|twitter|instagram" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <!--
      FONTS
    -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Poppins:wght@500&display=swap"
    rel="stylesheet" />
</head>

<body class="bg-dark">

    
    <nav class="d-flex mb-5">
    <div class="navbar fixed-top bg-dark d-flex justify-content-start" id="navbar">
      <img class="brand-wayz" src="img/wayz-green-white.png" alt="LogoWayz" height="30px">
    </div>
  </nav>

  <div class="container-fluid bg-dark d-flex flex-column">

    <h2 class="text-light d-flex justify-content-center mt-5" id="recover-title">Recover password</h2>

	  <?php

		    /*
		include - Faz a inclusão do arquivo, permitindo executar a lógica do programa que se encontra neste arquivo
		
		*/
		include 'conexao.php';	
		/*
	     $_POST - É uma variável global que captura o conteúdo que está no formulário por meio da propriedade name		
		*/

		//Passando os dados que estão no formulário para as variáveis abaixo
        $cd_email      = $_POST['cd_email'];
		
		$resultemail = mysqli_query($con,"select * from tb_usuario where cd_email = '$cd_email'");	
		$resultsenha = mysqli_query($con,"select cd_user,cd_senha from tb_usuario where cd_email = '$cd_email'");	

		$exibe = $resultsenha->fetch_assoc();

		if( mysqli_num_rows ($resultemail) > 0){ 
    
            echo "<table class='text-light d-flex m-auto mt-5'>"; 
            echo  "<tr><td></td></tr>";
            echo "<tr><td> Username :".$exibe["cd_user"]."</td></tr>";
            echo "<tr><td> Password :".$exibe["cd_senha"]."</td></tr>";

            echo "<tr><td><a class='text-success' href=index.html>Login page</a></td></tr>";
            
        }else{
            echo"<script>alert('Endereço de E-mail inexistente.');</script>";
            echo"<script>window.location='recupsenha.html'</script>";
        }
			
        
        
    ?>

    </div>

  <!-- 
  FOOTER
-->

  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <script src="js/script.js" async defer></script>

</body>

</html>		
			
			
		