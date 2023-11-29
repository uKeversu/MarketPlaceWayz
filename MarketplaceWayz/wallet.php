<?php
include 'conexao.php';
session_start();
		$ids_user=$_SESSION['id_usuario'];

$ftperfil = mysqli_query($con,"select pathft,cd_user,money_userB,money_userE from tb_usuario where id_usuario = '$ids_user' ");
 $ft = mysqli_query($con,"select pathft,cd_user,money_userB,money_userE from tb_usuario where id_usuario = '$ids_user' ");

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wayz - My Wallet</title>
    <link rel="stylesheet" href="css/menu.css" />
    <link rel="stylesheet" href="css/account.css" />
    <link rel="stylesheet" href="css/my-wallet.css" />

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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!--
      FONTS
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Poppins:wght@500&display=swap"
        rel="stylesheet" />

<<style>

.balance{
    display: flex;
    margin: 0 auto;
  background-color: transparent;
  max-width: 400px;
  height: 150px;
  border-radius: 5vh;
  align-items: center;
  padding-left:2vh
}

.balance{
    display: flex;
    margin: 0 auto;
}

.balance span{
    margin-left: 1vh;
    color: gray;
}

#btn-withdraw {
    border: none;
    background-color: var(--green);
    border-radius: 100%;
    transition: 0.3s;  
    width: 50px;
    height: 50px;
}

#btn-withdraw, #p-withdraw{
    margin-left: 2vh;
}
  
#btn-withdraw:hover {
    background-color: transparent;
    border: 1px solid var(--light-green);
    box-shadow: 0px 0px 7px var(--light-green);
    color: var(--light-green);
    transition: 0.1s;
}

#btn-deposit {
    border: none;
    background-color: var(--green);
    border-radius: 100%;
    transition: 0.3s;
    width: 50px;
    height: 50px;
}
  
#btn-deposit:hover {
    background-color: transparent;
    border: 1px solid var(--light-green);
    box-shadow: 0px 0px 7px var(--light-green);
    color: var(--light-green);
    transition: 0.1s;
}

.btn-confirm-deposit, .btn-confirm-withdraw, .btn-confirm-profile{
    border: none;
    background-color: var(--green);
    width: 100%;
    border-radius: 10vh;
    transition: 0.3s;
}

.btn-confirm-deposit:hover, .btn-confirm-withdraw:hover, .btn-confirm-profile:hover{
    background-color: transparent;
    border: 1px solid var(--light-green);
    box-shadow: 0px 0px 7px var(--light-green);
    color: var(--light-green);
    transition: 0.1s;
}

#value{
  background-color: transparent;
  border: 2px solid gray;
  border-radius: 10vh;
}

#value:focus{
  transition: 0.3s;
  border: 2px solid var(--light-green);
  box-shadow: 0px 0px 7px var(--light-green);
}


input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/*
    PROFILE SETTINGS
*/

#profile-settings{
    color: white;
    margin-bottom: 24px;
    border:none;
}

#profile-settings:hover{
    color: var(--light-green);
    border: none;
}

.alter-image{
    border-radius: 50%;
    max-width: 250px;
}

.btn-change-profile{
    border: none;
    background-color: var(--green);
    width: 100%;
    border-radius: 10vh;
    transition: 0.3s;
}

.btn-change-profile:hover{
    background-color: transparent;
    border: 1px solid var(--light-green);
    box-shadow: 0px 0px 7px var(--light-green);
    color: var(--light-green);
    transition: 0.1s;
}

#btn-change-password{
    border: none;
    background-color: var(--green);
    border-radius: 10vh;
    transition: 0.3s;
    width:100%;
    margin-left: 0.5vh;
}

#btn-change-password:hover{
    background-color: transparent;
    border: 1px solid var(--light-green);
    box-shadow: 0px 0px 7px var(--light-green);
    color: var(--light-green);
    transition: 0.1s;
}

#btn-change-username{
    border: none;
    background-color: var(--green);
    border-radius: 10vh;
    transition: 0.3s;
    width:100%;
    margin-left: 0.5vh;
}

#btn-change-username:hover{
    background-color: transparent;
    border: 1px solid var(--light-green);
    box-shadow: 0px 0px 7px var(--light-green);
    color: var(--light-green);
    transition: 0.1s;
}

.change-password{
  color: var(--white);
  background-color: transparent;
  border: 2px solid gray;
  border-radius: 10vh;
  font-size: smaller;
}

.change-password::placeholder{
  color: rgb(204, 204, 204);
  font-size: small;
}

.change-password:focus{
  transition: 0.3s;
  border: 2px solid var(--light-green);
  box-shadow: 0px 0px 7px var(--light-green);
  background-color: transparent;
}

.change-username{
  color: var(--white);
  background-color: transparent;
  border: 2px solid gray;
  border-radius: 10vh;
  font-size: smaller;
}

.change-username::placeholder{
  color: rgb(204, 204, 204);
  font-size: small;
}

.change-username:focus{
  transition: 0.3s;
  border: 2px solid var(--light-green);
  box-shadow: 0px 0px 7px var(--light-green);
  background-color: transparent;
}

#btn-delete-account{
    border: none;
    background-color: #dc3545;
    color: var(--white);
    border-radius: 10vh;
    transition: 0.3s;
    margin-left: 0.5vh;
    width:50%;
    margin: 0 auto;
}

#btn-delete-account:hover{
    background-color: transparent;
    border: 1px solid #f74658;
    box-shadow: 0px 0px 7px #f74658;
    color: #f74658;
    transition: 0.1s;
}

</style>

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
            
            <button class="btn" id="profile-settings" type="submit" data-bs-toggle="modal" data-bs-target="#modal-profile" data-bs-whatever="@getbootstrap"><i class="bi bi-pencil-square"></i> </button>
            </div>
          
            <div class="card-filters d-flex justify-content-around">
                <a id="filter" href="account-page.php" class="filter">NFTs</a>
                <a id="filter" href="collections.php" class="filter">Collections</a>
                <a id="filter" href="#" class="filter active">My Wallet</a>
            </div>
        </div>
        <section class="wallet">
            <h4 class="balance-title text-secondary mb-5 d-flex justify-content-around">Account balance</h4>
            <div class="balance d-flex justify-content-around">
                <div class="balance-shd-flex flex-column">
                    <h3 class="balance-eth text-light d-flex justify-content-center"><?php echo $arquivo['money_userE']; ?> <span> ETH</span></h3>
                    <h3 class="balance-btc text-light d-flex justify-content-center"><?php echo $arquivo['money_userB']; ?><span> BTC</span></h3>
                </div>
                </div>
                <?php
                }
                ?>
                <div class="deposit d-flex flex-row justify-content-around">
                    <div class="d-flex flex-column align-items-center">
                        <button class="btn btn-dark" id="btn-deposit" type="submit" data-bs-toggle="modal" data-bs-target="#modal-deposit" data-bs-whatever="@getbootstrap"><i class="bi bi-arrow-up"></i> </button>
                        <p id="p-deposit">Deposit</p>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <button class="btn btn-dark" id="btn-withdraw" type="submit" data-bs-toggle="modal" data-bs-target="#modal-withdraw" data-bs-whatever="@getbootstrap"><i class="bi bi-arrow-down"></i> </button>
                        <p id="p-withdraw">Withdraw</p>
                    </div>
                </div>
            </div>

<!-- 
    MODAL DEPÓSITO
-->
            <form method="POST" action="deposito.php">
            <div class="modal fade" id="modal-deposit" tabindex="-1" aria-labelledby="modal-deposit-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title text-light fs-5" id="modal-deposit">How much do you want do deposit?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="mb-3 d-flex flex-row justify-content-around">
                    <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" value ="ETH" name="moeda_escolhida" id="exampleRadio1"
                                value="option1" checked>
                            <label class="form-check-label text-light" for="exampleRadio1">
                                ETHEREUM
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="moeda_escolhida" value ="BITCOIN" id="exampleRadios"
                                value="option2">
                            <label class="form-check-label text-light" for="exampleRadio2">
                                BITCOIN
                            </label>
                        </div>
                    </div>
                    
                    
                    <div class="mb-3">
                        <label for="value" class="col-form-label text-light">Enter the value:</label>
                        <input type="number" class="form-control text-light" id="value" name="valorD">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-confirm-deposit">Confirm deposit</button>
                    </div>
                </div>
                </div>
                </div>
                </form>
<!-- 
    MODAL SAQUE
-->
<form method="POST" action="saque.php">
    <div class="modal fade" id="modal-withdraw" tabindex="-1" aria-labelledby="modal-withdraw-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title text-light fs-5" id="modal-withdraw">How much do you want do withdraw?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="mb-3 d-flex flex-row justify-content-around">
                    <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" value ="ETH" name="moeda_escolhida" id="exampleRadio1"
                                value="option1" checked>
                            <label class="form-check-label text-light" for="exampleRadio1">
                                ETHEREUM
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="moeda_escolhida" value ="BITCOIN" id="exampleRadios"
                                value="option2">
                            <label class="form-check-label text-light" for="exampleRadio2">
                                BITCOIN
                            </label>
                        </div>
                    </div>
                    
                    
                    <div class="mb-3">
                        <label for="value" class="col-form-label text-light">Enter the value:</label>
                        <input type="number" class="form-control text-light" id="value" name="valorS">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-confirm-withdraw">Confirm withdraw</button>
                </div>
                </div>
            </div>
            </div>
 </form>
<!--
    MODAL EDIÇÃO DE PERFIL
-->


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
                                        <input type="text" name="name" id="Change username" class="change-username form-control text-light" autocomplete="off">
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
                        
                            <div class="row g-3 flex-column">
                                <div class="col-auto">
                                    <label for="change-password" class="col-form-label text-light">Password</label>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                <div class="col-6">
                                    <input type="password" name="password" id="Change password" class="change-password form-control text-light" autocomplete="off">
                                </div>
                                <div class="col-6">
                                    <button name ="upload" class="btn btn-success" id="btn-change-password" type="submit">Change password </button>
                                    </span>
                        
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="excluiruser.php" method="POST">
                        <div class="d-flex m-auto">
                            <button name ="upload" class="btn btn-delete-account mt-5" id="btn-delete-account" type="submit">Delete account </button></span>
                    </div>
                    </form>
                </div>
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