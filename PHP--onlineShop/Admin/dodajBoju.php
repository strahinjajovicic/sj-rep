<?php

include ('../konekcija.php');
$GLOBALS['konekcija'] = konekcija();

$ime = $_POST['ime'];
$slika = $_POST['slika'];
$cena = $_POST['cena'];

$upit = "INSERT INTO `boje`(`ime`, `slika`, `cena`) VALUES ('$ime', '$slika', $cena)";
$rezultat = mysqli_query($konekcija, $upit);

header("Location:home.php");