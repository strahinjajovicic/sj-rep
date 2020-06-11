<?php
    session_start();
    $con = mysqli_connect("localhost","root","","okrecime");
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $niz_boja_id = array_column($_SESSION["cart"],"id_boje");
            if (!in_array($_GET["id"],$niz_boja_id)){
                $broji = count($_SESSION["cart"]);
                $niz = array(
                    'id_boje' => $_GET["id"],
                    'ime' => $_POST["hidden_name"],
                    'cena' => $_POST["hidden_price"],
                    'kolicina' => $_POST["quantity"],
                );
                $_SESSION["cart"][$broji] = $niz;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Proizvod je vec dodat u korpu")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $niz = array(
                    'id_boje' => $_GET["id"],
                    'ime' => $_POST["hidden_name"],
                    'cena' => $_POST["hidden_price"],
                    'kolicina' => $_POST["quantity"],
                );
            $_SESSION["cart"][0] = $niz;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["id_boje"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Proizvod je sklonjen...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>OkreciME</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

            *{
                font-family: 'Titillium Web', sans-serif;
            }
            .product{
                border: 1px solid #eaeaec;
                margin: -1px 19px 3px -1px;
                padding: 10px;
                text-align: center;
                background-color: #efefef;
            }
            table, th, tr{
                text-align: center;
            }
            .title2{
                text-align: center;
                color: #66afe9;
                background-color: #efefef;
                padding: 2%;
            }
            h2{
                text-align: center;
                color: #66afe9;
                background-color: #efefef;
                padding: 2%;
            }
            table th{
                background-color: #efefef;
            }
        </style>
    </head>
    <body>
        <div class="w3-top">
            <div class="w3-bar w3-white w3-wide w3-padding w3-card">
                
                <?php
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
                    <a href="offer.php" class="w3-bar-item w3-button w3-mobile">Poruci</a>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="container" style="width: 65%">
            
            <div style="clear: both"></div>
            <h3 class="title2">Korpa</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                <tr>
                    <th width="30%">naziv proizvoda</th>
                    <th width="10%">Kvadratura</th>
                    <th width="13%">Cena po kvadratu</th>
                    <th width="10%">Ukupna cena</th>
                    <th width="17%">Izbaci iz korpe</th>
                </tr>

                <?php
                    if(!empty($_SESSION["cart"])){
                        $ukupno = 0;
                        foreach ($_SESSION["cart"] as $keys => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value["ime"]; ?></td>
                                <td><?php echo $value["kolicina"]; ?></td>
                                <td>$ <?php echo $value["cena"]; ?></td>
                                <td>$ <?php echo number_format($value["kolicina"] * $value["cena"], 2); ?></td>
                                <td>
                                    <a href="Cart.php?action=delete&id=<?php echo $value["id_boje"]; ?>">
                                        <span class="text-danger">Izbaci</span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $ukupno = $ukupno + ($value["kolicina"] * $value["cena"]);
                        }
                            ?>
                            <tr>
                                <td colspan="3" align="right">Ukupno:</td>
                                <th align="right">$ <?php echo number_format($ukupno, 2); ?></th>
                                <td></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
            <a href="offer.php">Nastavi kupovinu</a>
        </div>
    </body>
</html>