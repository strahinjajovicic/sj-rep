<?php

session_start();

if(!isset($_SESSION['id'])) {
    include("konekcija.php");
    $GLOBALS["konekcija"] = konekcija();
    
    $ime = filter_input(INPUT_POST, 'name');
    $sifra = filter_input(INPUT_POST, 'password');
    
    $upit = "SELECT * FROM korisnici WHERE korisnickoime = '$ime'";
    $result = mysqli_query($GLOBALS["konekcija"], $upit);
    $rez = mysqli_fetch_assoc($result);
    $verify=password_verify($sifra, $rez['lozinka']);
    
    if($verify) {
        echo'ok'; 
        $_SESSION['id'] = $rez['id'];
        $_SESSION['ime'] = $rez['korisnickoime'];
        $_SESSION['tip'] = $rez['tip'];
    } else {
        echo'Nije dobra sifra';
        header("Location:login.php");
    }
    
   if($_SESSION['tip'] === 'admin') {
       header("Location:Admin/home.php");
   }
   else {
       header("Location:index.php");
   }
}
else {
    session_destroy();
    header("Location:index.php");
}

