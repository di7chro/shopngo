<?php
    $host = "localhost";
    $databas = "shopngo";
    $user = "crille";
    $pass = "hemligt";
    
    $link = mysqli_connect($host, $user, $pass, $databas) or die ("Kunde inte koppla upp mig till databasen");
?>
