<?php
function konekcija() {
    $veza = mysqli_connect("localhost", "root", "", "okrecime");
    if (!$veza)
        die ("Losa konekcija ".mysqli_connect_error());
    return $veza;
}

