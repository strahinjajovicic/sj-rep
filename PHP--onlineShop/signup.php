<!DOCTYPE html>
<!--
    Design by Nikola 104/16 IT
-->
<html>
    <head>
        <title>OkreciME</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
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
        <div class="w3-content w3-padding" style="max-width:1564px">
            <div class="w3-container w3-padding-32 w3-display-topmiddle" id="contact">
                <br>
                <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16" align="center">Sign Up</h3>
                <form action="sign.php" method="POST">
                    <input class="w3-input w3-border" type="text" placeholder="Name*" required name="name">
                    <input class="w3-input w3-section w3-border" type="text" placeholder="Email*" required name="email">
                    <input class="w3-input w3-section w3-border" type="password" placeholder="Password*" required name="password">
                    <br>
                    <button class="w3-button w3-black w3-section w3-display-bottommiddle" type="submit">
                        <i class="fa fa-paper-plane"></i> Sign Up
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>