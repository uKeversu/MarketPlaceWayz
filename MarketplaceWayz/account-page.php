<?php
include 'conexao.php';
session_start();
		$ids_user=$_SESSION['id_usuario'];

$ftperfil = mysqli_query($con,"select pathft,cd_user from tb_usuario where id_usuario = '$ids_user' ");

$result = mysqli_query($con,"select id_nft,path,desc_nft,col_nft,vlr_nft,moeda_nft from tb_nfts  where ids_user = '$ids_user' ");
 
$rs = mysqli_query($con,"select cd_user from tb_usuario join tb_nfts on ids_user = id_usuario where ids_user = '$ids_user' ");
 

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
    <title>Wayz - My Wallet</title>
    <link rel="stylesheet" href="css/menu.css" />
    <link rel="stylesheet" href="css/account.css" />

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
                <a href="home.php"><i class="bi bi-house-fill"></i>Home</a>
            </div>
            <div>
                <a href="creator-page.php"><i class="bi bi-pencil-fill"></i>Create NFT</a>
            </div>
            <div>
                <a href="account-page.php" class="active"><i class="bi bi-person-fill"></i>Account</a>
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

    <div class="container bg-dark">
        <div class="profile">
            <div class="img d-flex justify-content-center">
                <?php
            while($arquivo = mysqli_fetch_assoc($ftperfil)) {
                         ?> 
                <img class="profile-img" src="<?php echo $arquivo['pathft']; ?>" alt="perfil" width="200px" height="200px">
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center">
                <h4 class="text-light d-flex justify-content-center mt-3 mb-5">@<?php echo $arquivo['cd_user']; ?></h4>

            </div>
            <?php
            
            }
            ?>
            <div class="card-filters d-flex justify-content-around">
                <a id="filter" href="#" class="filter active">NFTs</a>
                <a id="filter" href="collections.php" class="filter">Collections</a>
                <a id="filter" href="wallet.php" class="filter">My Wallet</a>
            </div>
        </div>

        <section class="cards-nfts col-12">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                
                <?php 
                     
                     while($arquivo = mysqli_fetch_assoc($result)) {
                          ?> 
                    
                    <div class="col">
                    <div class="card bg-dark" id="cards">
                    <img class="img" src="<?php echo $arquivo['path']; ?>" alt="" height="250px" width="296px"
                            data-toggle="modal" data-target="#basicExampleModal3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <h6 class="card-title"><?php echo $arquivo['desc_nft']; ?></h6>
                                 <h6 class="card-title">#<?php echo $arquivo['id_nft']; ?></h6>
                            </div>
                            <p class="card-collection mb-1"><?php echo $arquivo['col_nft']; ?>'s Collection</p>
                            <div class="d-flex justify-content-between">
                            <p class="card-text"><?php echo $arquivo['vlr_nft']; ?> <?php echo $arquivo['moeda_nft']; ?></p>
                                <div class="d-flex flex-row">
                                                          
                            <a href="editarnft.php?id=<?php echo $arquivo['id_nft']?>" id="btn-alter" class="btn-alter btn btn-dark d-flex justify-content-center"><i class="bi bi-pencil-fill"></i></a>
                                </div>
                 
                            </div>
                            
                        </div>
           
                    </div>
              
                </div>

                <?php 
                 }
                
             ?>

<div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="modal-profile-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title text-light fs-5" id="modal-profile">Profile settings</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="alteraftpf.php" method="POST">
                        <div class="mb-3 d-flex flex-row justify-content-around">
                        <?php
                            while($arquivo = mysqli_fetch_assoc($ft)) {
                         ?> 
                           <img class="profile-img" src="<?php echo $arquivo['pathft']; ?>" alt="perfil" width="50px" height="50px">
                           <?php
                        }
                        ?>
                        </div>
                        <div class="mb-3 d-flex flex-column justify-content-center">
                            
                        <input type="file" name="arquivos" class="btn btn-dark mb-3"  accept="image/png, image/jpeg"  multiple /> 
                            <button type="submit" name ="upload" class="btn btn-success btn-change-profile">Change image</button>
                        </div>
                    </form>
                    
                    <form action="alteraname.php" method="POST">
                        <div class="mb-3">
                            <div class="row g-3 flex-column">
                                <div class="col-auto">
                                    <label for="change-password" class="col-form-label text-light">Username</label>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <div class="col-6">
                                        <input type="text" name="name" id="Change username" class="form-control text-light" autocomplete="off">
                                    </div>
                                    <div class="col-6">
                                        <button name ="upload" class="btn btn-success" id="btn-change-password" type="submit">Change username</button>
                                        </span>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </form>

                    <form action="alterapassword.php" method="POST">
                        <div class="mb-3">
                            <div class="row g-3 flex-column">
                                <div class="col-auto">
                                    <label for="change-username" class="col-form-label text-light">Password</label>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                <div class="col-6">
                                    <input type="password" name="password" id="Change password" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-6">
                                    <button name ="upload" class="btn btn-success" id="btn-change-username" type="submit">Change password </button>
                                    </span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                </div>
                    </div>

        </section>
    </div>
    <hr style="width: 100%; color: var(--white)" />
    <footer class="footer bg-dark p-3">
        <img src="img/wayz-green-white.png" alt="logo-wayz">
        <small class=" text-light">©️ Todos os direitos reservados</small>
    </footer>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    <script src="js/script.js" async defer></script>

</body>

</html>