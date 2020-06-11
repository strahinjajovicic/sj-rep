<!DOCTYPE html>
<!--
Design by Nikola Milojic 104/16 IT
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <title>OkreciME</title>
    </head>
     <style type="text/css">
        .margine {
            margin-left: 3%;
            margin-right: 3%;
            }
    </style>
    <body>
        <div class="w3-top">
            <div class="w3-bar w3-white w3-wide w3-padding w3-card">
                
                <?php
                    session_start();
                    if (!isset($_SESSION['id'])) {
                ?>
                <a href="login.php" class="w3-bar-item w3-button w3-mobile">Ulogujte Se</a>
                <a href="signup.php" class="w3-bar-item w3-button w3-mobile">Registrujte Se</a>
                    <?php } else { ?>
                <a href="log.php" class="w3-br-item w3-button w3-mobile">Izlogujte Se</a>Zdravo <?php echo'<b>' . $_SESSION['ime'] . '</b>'; ?>
                <a href="cart.php">
                    <i class="fa fa-shopping-cart" style="font-size:36px"></i>
                </a>
                    <?php 
                    }
                    ?>
                <div class="w3-right">
                    <a href="index.php" class="w3-bar-item w3-button w3-mobile">Pocetna</a>
                    <a href="index.php#about" class="w3-bar-item w3-button w3-mobile">O nama</a>
                    <?php if(isset($_SESSION['id'])) {?>
                    <a href="offer.php" class="w3-bar-item w3-button w3-mobile">Poruci</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
            <img class="w3-image" src="Slike/pocetna.png" alt="Okreci-Me" width="1500" height="800">
            <div class="w3-display-middle w3-margin-top w3-center">
                <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Okreci</b></span> <span class="w3-hide-small w3-text-grey">ME</span></h1>
            </div>
        </header>
        <div class="w3-content w3-padding" style="max-width:1550px">
            <div class="w3-container w3-padding-32" id="about">
                <h3 class="w3-border-bottom w3-border-light-grey w3-padding-small">O nama</h3>
                <br>
                <h3>Kolektiv najboljih molera u nasem gradu</h3>
                <br>
                <h4>Vrlo lako i vrlo brzo okrecite svaku povrsinu</h4>
                <h4>PO IZUZETNO <b>POVOLJNOJ</b> CENI</h4>
            </div>
        </div>
    </body>
</html>