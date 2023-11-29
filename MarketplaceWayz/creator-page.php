
<?php


include 'conexao.php';
session_start();
		$ids_user=$_SESSION['id_usuario'];

$result = mysqli_query($con,"select id_nft,path,moeda_nft,desc_nft,col_nft,vlr_nft from tb_nfts  where ids_user = '$ids_user' order by id_nft desc limit 1;");
 
$rs = mysqli_query($con,"select cd_user from tb_usuario join tb_nfts on ids_user = id_usuario where ids_user = '$ids_user' order by id_nft desc limit 1;");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wayz - Create NFT</title>
    <link rel="stylesheet" href="css/menu.css" />
    <link rel="stylesheet" href="css/creator.css">

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

<body style="height: 100%;" class="bg-dark">

    <!-- Navbar -->
    <nav>
        <div class="navbar fixed-top bg-dark d-flex justify-content-around" id="navbar">
            <img class="logo ml-5" src="img/wayz-green-white.png" alt="LogoWayz" height="30px">
            <div>
                <a href="home.php"><i class="bi bi-house-fill"></i>Home</a>
            </div>
            <div>
                <a href="creator-page.php" class="active"><i class="bi bi-pencil-fill"></i>Create NFT</a>
            </div>
            <div>
                <a href="account-page.php"><i class="bi bi-person-fill"></i>Account</a>
            </div>
            <!--
        BARRA DE PESQUISA
      -->
            <div class="pesquisa">
                <form autocomplete="off" class="d-flex" role="search">
                    <input id="pesquisa" class="form-control me-2" type="search" placeholder="Search NFTs and accounts"
                        aria-label="Search">
                    <button id="btn-pesquisa" class="btn btn-success" type="submit"> <i
                            class="bi bi-search"></i></button>
                </form>
            </div>
            <a href="index.html" class="logout"><i class="bi bi-box-arrow-left" id="logout"></i>
            </a>
            <a href="javascript:void(0);" class="icon" onclick="navBar()">
                <i class="bi bi-list"></i>
            </a>
        </div>
    </nav>

    <div class="container-fluid bg-dark">

        <!--
    PAGE TITLE
-->

        <div class="title-creator">
            <h2 class="text-light d-flex justify-content-center">Welcome to our NFT creator page</h2>
            <h4 class="text-light d-flex justify-content-center mt-3">Fill the gaps and click to see the preview</h4>
        </div>
        <div class="conteudo d-flex flex-row">


            <div class="dicas">

            </div>

            <!--
        CRIAÇÃO DA NFT
      -->
      <form autocomplete="off" class="fm d-flex" method="POST" enctype="multipart/form-data" action="cadastrar-nft.php">
           
           <?php 
                     
                    while($arquivo = mysqli_fetch_assoc($result)) {
                         ?> 
                          <div class="card-nfts">
                     <div class="card bg-dark" id="cards">
                     <img class="img" src="<?php echo $arquivo['path']; ?>" alt="" height="300px" width="300px">
                           <div class="card-body">
                             <div class="d-flex justify-content-between">
                                 <h6 class="card-title"><?php echo $arquivo['desc_nft']; ?></h6>
                                 <h6 class="card-title">#<?php echo $arquivo['id_nft']; ?></h6>
                             </div>
                             <p class="card-collection mb-1"><?php echo $arquivo['col_nft']; ?>'s Collection</p>
                             <div class="d-flex justify-content-between">
                                 <p class="card-text"><?php echo $arquivo['vlr_nft']; ?> <?php echo $arquivo['moeda_nft']; ?></p>
                                 <div class="d-flex flex-row">
                                 <?php 
                                 while($arquivo = mysqli_fetch_assoc($rs)) {
                         ?> 
                                 <p class="card-text ml-5"><?php echo $arquivo['cd_user']; ?></p>
                                 </div>
                                 <?php 
                 }
                
             ?>
                             </div>
                         </div>
                     </div>
                 </div>
                                     <?php 
                 }
                
             ?>
            <!-- 
                FORM 
            -->
            <div class="form-nft d-flex flex-column">
                
                    <div class="user d-flex">
                        <input type="text" class="form-control mb-2" id="nft-nome-input" name="desc_nft"
                            placeholder="Name" required />
                    </div>
                    <div class="user d-flex">
                        <input type="text" class="form-control mb-2" id="nft-nome-input" name="col_nft"
                            placeholder="Collection" required />
                    </div>
                    <div class="user d-flex">
                        <input type="number" class="form-control mb-2" id="nft-nome-input" name="vlr_nft"
                            placeholder="Value" required />
                    </div>

                    <div class="check-box d-flex flex-column justify-content-between">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" value ="ETH" name="moeda_nft" id="exampleRadio1"
                                value="option1" checked>
                            <label class="form-check-label text-light" for="exampleRadio1">
                                ETHEREUM
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="moeda_nft" value ="BITCOIN" id="exampleRadios"
                                value="option2">
                            <label class="form-check-label text-light" for="exampleRadio2">
                                BITCOIN
                            </label>
                        </div>
                    </div>

                    <!-- 
                        CHECKBOX EDIÇÃO
                    -->
                    <hr style="width: 100%; color: var(--white)" />

                    <div class="check-box d-flex flex-column">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="edicao_nft" value="Edicao limitada" id="flexSwitchCheckDefault">
                            <label class="form-check-label text-light" for="flexSwitchCheckDefault">Limited Edition</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="edicao_nft" value="Edicao ilimitada" id="flexSwitchCheckDefault" checked>
                            <label class="form-check-label text-light" for="flexSwitchCheckDefault">Unlimited Edition</label>
                        </div>
                    </div>

                    <hr style="width: 100%; color: var(--white)" />

                    <div class="check-box d-flex flex-column">

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio"  name="cat_nft" value="Gaming" id="exampleRadios1"
                               >
                            <label class="form-check-label text-light" for="exampleRadios1">
                                Gaming
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="cat_nft" value="PFP" id="exampleRadios2"
                                >
                            <label class="form-check-label text-light" for="exampleRadios2">
                                PFP
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio"  name="cat_nft" value="Art" id="exampleRadios3"
                                >
                            <label class="form-check-label text-light" for="exampleRadios3">
                                Art
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio"  name="cat_nft" value="Other" id="exampleRadios4"
                                 checked>
                            <label class="form-check-label text-light" for="exampleRadios4">
                                Other
                            </label>
                        </div>
                    </div>

                    <hr style="width: 100%; color: var(--white)" />
                    <div class="user d-flex ">
                        <input type="file" name="arquivo" class="btn btn-dark"  accept="image/png, image/jpeg"  multiple /> 
                    </div>
                    <div class="btn-nft">
                        <button name ="upload" class="btn btn-success mt-3 mb-3" id="btn-nft" type="submit">
                            Preview
                        </button>
                    
                </div>
            </form>
        </div>
    </div>

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