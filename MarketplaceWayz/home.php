<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wayz - Home</title>
  <link rel="stylesheet" href="css/home.css" />

  <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

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

  <div class="container bg-dark d-flex flex-column mt-5">
    <h2 class="text-light d-flex justify-content-center mt-5" id="home-title">Discover news NFTs and buy it on our marketplace</h2>

    <div class="card-filters d-flex justify-content-around mb-4 mt-3" id="card-filters">
      <a id="filter" href="#" class="filter active">All</a>
      <a id="filter" href="#" class="filter">New</a>
      <a id="filter" href="#" class="filter">Gaming</a>
      <a id="filter" href="#" class="filter">Art</a>
      <a id="filter" href="#" class="filter">PFPs</a>
      <a id="filter" href="#">Order by price</a>
    </div>
    
  </div>
  <div class="container-fluid bg-dark d-flex flex-column">

    <div class="conteudo justify-content-center">

      <!--
        LISTA DAS NFTS
      -->

      <?php
include("conexao.php");

               
 if(isset($_GET['buscar'])){

 
  $pesquisa = $_GET['buscar'];
$sql_code = "select id_nft,path,desc_nft,col_nft,vlr_nft,cd_user,edicao_nft,moeda_nft,cat_nft from tb_usuario join tb_nfts on ids_user = id_usuario where ids_user like '%$pesquisa%' or desc_nft like '%$pesquisa%' or col_nft like '%$pesquisa%' or vlr_nft like '%$pesquisa%' or cat_nft like '%$pesquisa%' or edicao_nft like '%$pesquisa%' or moeda_nft like '%$pesquisa%'";
$query = mysqli_query($con,$sql_code);


               
 while($arquivo = mysqli_fetch_assoc($query)) {
     ?> 
              
  <div class="card-nfts d-flex m-5">
    <div class="card bg-dark" id="cards">
      <img class="img" src="<?php echo $arquivo['path']; ?>" alt="" height="250px" width="296px">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h6 class="card-title"><?php echo $arquivo['desc_nft']; ?></h6>
            <h6 class="card-title">#<?php echo $arquivo['id_nft']; ?></h6>
          </div>
          <p class="card-collection mb-1"><?php echo $arquivo['col_nft']; ?>'s Collection</p>
           <div class="d-flex justify-content-between">
            <p class="card-text"><?php echo $arquivo['vlr_nft']; ?> <?php echo $arquivo['moeda_nft']; ?></p>
              <div class="d-flex flex-row">
                <p class="card-text"><?php echo $arquivo['cd_user']; ?></p>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
    <?php 
            }
          }else{
            $sql = ("select id_nft,path,desc_nft,col_nft,vlr_nft,cd_user,moeda_nft from tb_usuario join tb_nfts on ids_user = id_usuario where ids_user");
    $query = mysqli_query($con,$sql);
            while($arquivo = mysqli_fetch_assoc($query)) {
              ?> 
                       
                              <div class="card-nfts d-flex m-5">
                              <div class="col">
                         <div class="card bg-dark" id="cards">
                         <img class="img" src="<?php echo $arquivo['path']; ?>" alt="" height="250px" width="296px">
                               <div class="card-body">
                                  <div class="d-flex justify-content-between">
                                     <h6 class="card-title"><?php echo $arquivo['desc_nft']; ?></h6>
                                     <h6 class="card-title">#<?php echo $arquivo['id_nft']; ?></h6>
                                 </div>
                                 <p class="card-collection mb-1"><?php echo $arquivo['col_nft']; ?>'s Collection</p>
                                 <div class="d-flex justify-content-between">
                                     <p class="card-text"><?php echo $arquivo['vlr_nft']; ?> <?php echo $arquivo['moeda_nft']; ?></p>
                                     <div class="d-flex flex-row">
                                     <p class="card-text">@<?php echo $arquivo['cd_user']; ?></p>
                                 </div>
                                </div>
                                <a href="compra.php?id=<?php echo $arquivo['id_nft']?>" id="btn-buy" class="btn btn-success d-flex justify-content-center">Buy</a>  
                         </div>
                      </div>
                    </div>
                    </div>
                  <?php 
                     }
          }
        ?>
      </div>
    </div>
  </div>
  

<!--
  MODAL
-->
<form action="">
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ModalLabel">Are you sure to buy?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-success" id="btn-confirm">Confirm</button>
      </div>
    </div>
  </div>
</div>
</form> 

<!-- 
  FOOTER
-->

  <footer class="footer bg-dark p-3">
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