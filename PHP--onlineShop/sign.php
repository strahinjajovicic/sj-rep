<?php

include("konekcija.php");
$GLOBALS["konekcija"] = konekcija();

$ime = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$sifra = filter_input(INPUT_POST, 'password');
$error = 0;

if(empty($sifra)) {
    echo'Morate uneti šifru!';
    $error = 1;
}
if($error == 0) {
    $sifra1 = password_hash($sifra, PASSWORD_DEFAULT);
    
    $user_type = 'user';
    $upit = "INSERT INTO korisnici (tip, korisnickoime, mail, lozinka) VALUES ('$user_type', '$ime', '$email', '$sifra1')";
    $rez = mysqli_query($GLOBALS["konekcija"], $upit);
    if(!$rez) {
        die("Doslo je do greske prilikom cuvanja" . mysqli_error($GLOBALS["konekcija"]));
    }
    echo("Uspesno ste se registrovali");
    header("Location: index.php");
    
}
