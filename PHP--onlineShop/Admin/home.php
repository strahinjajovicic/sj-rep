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
        table, tr, td {
            border: 1px solid black;
        }
        img {
            max-height: 20px;
            min-height: 20px;
            max-width: 40px;
            min-width: 40px;
        }
    </style>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['id'])) {
                if($_SESSION['tip'] !== 'admin') {
                    header("Location:../index.php");
                    exit();
                }
            } else {
                header("Location:../login.php");
                exit();
            }
        ?>
        <div class="w3-top">
            <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <?php
                if (!isset($_SESSION['id'])) {
            ?>
            <?php } else { ?>
                <a href="../log.php" class="w3-br-item w3-button w3-mobile">Izlogujte Se</a>Zdravo <?php echo'<b>' . $_SESSION['ime'] . '</b>'; ?>
            <?php 
                }
            ?>
            </div>
        </div>
        <div class="w3-content w3-padding" style="max-width:1564px">
            <div class="w3-container w3-padding-32 w3-display-topmiddle">
                <br><br><br>
                <h1 align="center">Spisak korisnika</h1>
                <table>
                    <tr>
                        <td>ID:</td>
                        <td>Tip:</td>
                        <td>Korisnicko ime:</td>
                        <td>E-Mail:</td>
                    </tr>
                        <?php
                            include("../konekcija.php");
                            $GLOBALS["konekcija"] = konekcija();

                            $upit = "SELECT id, tip, korisnickoime, mail FROM korisnici";
                            $rezultat = mysqli_query($konekcija, $upit);

                            while ($red = mysqli_fetch_assoc($rezultat)) {
                                echo'<tr><td>' . $red['id'] . '</td><td>' . $red['tip'] . '</td><td>' . $red['korisnickoime'] . '</td><td>' . $red['mail'] . '</td></tr>';
                            }
                        ?>
                </table>
                <div class="w3-display">
                    <form action="obrisiKorisnika.php" method="POST">
                        <input type="text" name="id">
                        <button class="w3-button w3-black w3-section w3-display" type="submit">Obrisi</button>
                    </form>
                </div>
                <h1 align="center">Spisak boja</h1>
                <table>
                    <tr>
                        <td>ID:</td>
                        <td>Ime:</td>
                        <td>Slika:</td>
                        <td>Cena</td>
                    </tr>
                    <?php
                        $upit2 = "SELECT * FROM boje";
                        $rezultat2 = mysqli_query($konekcija, $upit2);
                        
                        while ($red2 = mysqli_fetch_assoc($rezultat2)) {
                            echo '<tr><td>' . $red2['id'] . '</td><td>' . $red2['ime'] . '</td><td><img src="../Slike/Offers/' . $red2['slika'] . '"></td><td>' . $red2['cena'] . 'e</td></tr>';
                        }
                    ?>
                </table>
                <br>
                <form action="obrisiBoju.php" method="POST">
                    <input type="text" name="id">
                    <button class="w3-button w3-black w3-section w3-display" type="submit">Obrisi</button>
                </form>
                <br>
                <h1 align="center">Dodaj boju</h1>
                <br>
                <form action="dodajBoju.php" method="POST">
                    <table>
                        <tr>
                            <td>Ime: </td>
                            <td><input type="text" name="ime"></td>
                        </tr>
                        <tr>
                            <td>Slika: </td>
                            <td><input type="text" name="slika"></td>
                        </tr>
                        <tr>
                            <td>Cena: </td>
                            <td><input type="text" name="cena"></td>
                        </tr>
                    </table>
                    <button class="w3-button w3-black w3-section w3-display" type="submit">Dodaj</button>
                </form>
            </div>
        </div>
    </body>
</html>


