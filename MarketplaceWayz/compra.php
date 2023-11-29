<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wayz - Compra de NFT</title>
  <link rel="stylesheet" href="css/home.css" />
  <link rel="stylesheet" href="css/compra.css" />

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

  <!-- Navbar -->
  <nav>
    <div class="navbar fixed-top bg-dark d-flex justify-content-around" id="navbar">
      <img class="logo ml-5" src="img/wayz-green-white.png" alt="LogoWayz" height="30px">
      <div>
        <a href="home.php" id="nav-item" class="active"><i class=" bi bi-house-fill"></i>Home</a>
      </div>
      <div>
        <a href="creator-page.php" id="nav-item"><i class="bi bi-pencil-fill"></i>Create
          NFT</a>
      </div>
      <div>
        <a href="account-page.php" id="nav-item"><i class="bi bi-person-fill"></i>Account</a>
      </div>
      <!--
        BARRA DE PESQUISA
      -->
      <div class="pesquisa">
              <form autocomplete="off" action="" class="d-flex" role="search">
          <input name="buscar" id="pesquisa" class="form-control me-2" type="search" placeholder="Search NFTs and accounts">
          <button type="submit" id="btn-pesquisa" class="btn btn-success"> <i class="bi bi-search"></i></button>
        </form>
      </div>
      <a href="index.html" class="logout"><i class="bi bi-box-arrow-left" id="logout"></i>
      </a>
      <a href="javascript:void(0);" class="icon" onclick="navBar()">
        <i class="bi bi-list"></i>
      </a>
    </div>
  </nav>

    <h2 class="text-light d-flex justify-content-center" id="buy-title">Are you sure to buy?</h2>
    
  <div class="container-fluid bg-dark d-flex flex-column">

    <div class="conteudo justify-content-center">
  <?php
	include 'conexao.php';
	session_start();
	$id_user=$_SESSION['id_usuario'];
   
/*
isset - Retorna verdadeiro se tem valor no ID
*/
    if(isset($_GET["id"])){
/*
 is_numeric - É a função que retorna se o valor é numérico.
*/
       if(is_numeric($_GET["id"])){
            $id = $_GET["id"];
            $sql = "SELECT id_nft,path,desc_nft,col_nft,vlr_nft,moeda_nft,cd_user,id_usuario FROM tb_nfts  join tb_usuario  on ids_user = id_usuario  WHERE id_nft = '$id'";
            
  /*          
        mysqli_query - É a função que irá retornar o resultado da script SQL por meio da variável.
      */          
            $executa=mysqli_query($con,$sql);
   /*
                 mysqli_fetch_array - Retorna o campo, a posição do array
            */
            ?> 
<form action="comprar.php" method="post">
<?php
    while($arquivo = mysqli_fetch_assoc($executa)) {
        ?> 
                   <div class="card-nfts d-flex m-5">
                              <div class="col">
                         <div class="card bg-dark" id="cards">
                         <img class="img" name ="path" value ="<?php echo $arquivo['path']; ?>" src="<?php echo $arquivo['path']; ?>" alt="" height="250px" width="296px">
                               <div class="card-body">
                                  <div class="d-flex justify-content-between">
                                     <h6 class="card-title" name ="desc_nft" value ="<?php echo $arquivo['desc_nft']; ?>"><?php echo $arquivo['desc_nft']; ?></h6>
                                    <h6 class="card-title">#<?php echo $arquivo['id_nft']; ?></h6>
                                    <input type="hidden" class="form-control" id="id_cliente" name="id_nft" value="<?php echo $arquivo['id_nft'];?>"/> 
                                 </div>
                                 <p class="card-collection mb-1" name ="col_nft" value ="<?php echo $arquivo['col_nft']; ?>"><?php echo $arquivo['col_nft']; ?>'s Collection</p>
                                 <div class="d-flex justify-content-between">
                                     <p class="card-text" ><?php echo $arquivo['vlr_nft']; ?> <?php echo $arquivo['moeda_nft']; ?></p>
                                     <div class="d-flex flex-row">
                                     <p class="card-text">@<?php echo $arquivo['cd_user']; ?></p>
                                     <input type="hidden" class="form-control" id="id_cliente" name ="cd_user" value ="<?php echo $arquivo['cd_user']; ?>"/> 
                                     <input type="hidden" class="form-control" id="id_cliente" name ="moeda_nft" value ="<?php echo $arquivo['moeda_nft']; ?>"/> 
                                     <input type="hidden" class="form-control" id="id_cliente" name ="vlr_nft" value ="<?php echo $arquivo['vlr_nft']; ?>"/> 
                                     <input type="hidden" class="form-control" id="id_cliente" name ="ids_vend" value ="<?php echo $arquivo['id_usuario']; ?>"/> 
                                 </div>
                                </div> 
                                <button type="submit" id="btn-buy" class="btn btn-success">Confirm</button>
                         </div>
                      </div>
                    </div>
                    </div>
                    <?php 
                     }
                    }
                }	
        ?>    
        </form>
      </div>
    </div>
  </div>

  <!-- 
  FOOTER
-->

<footer class="footer bg-dark p-1">
  <hr style="width: 100%; color: var(--white)" />
    <img src="img/wayz-green-white.png" alt="logo-wayz">
    <small class=" text-light">©️ Todos os direitos reservados</small>
  </footer>

  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <script src="js/script.js" async defer></script>

</body>
</html>