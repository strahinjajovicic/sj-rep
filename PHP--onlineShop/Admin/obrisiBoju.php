<?php

include ('../konekcija.php');
$GLOBALS['konekcija'] = konekcija();

$id = $_POST['id'];

$upit = "DELETE FROM boje WHERE id = $id";
$rezultat = mysqli_query($konekcija, $upit);

header("Location:home.php");

