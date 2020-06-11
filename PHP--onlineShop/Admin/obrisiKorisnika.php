<?php

include('../konekcija.php');
$GLOBALS['konekcija'] = konekcija();

$id = $_POST['id'];

$upit = "DELETE FROM korisnici WHERE id = $id";
$reultat = mysqli_query($konekcija, $upit);

header("Location:home.php");