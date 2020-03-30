<?php
    // Starta igång sessioner om det inte redan startats
    if(!isset($_SESSION))
        session_start();

    // Initiera lite variabler så att vi inte får felmeddelanden vid uppdatering
    $old_namn = '';
    $old_id = 0;
    $update = false;

    include_once 'inc_dbconnect.php'; 
    // Man vill lägga till en ny person
    if (isset($_POST['spara'])) {
        $namn = htmlentities($_POST['namn'], ENT_QUOTES);
        $sql = "INSERT INTO Cart (Cart_Namn) VALUES('$namn')";
        $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Cart har blivit sparad.";
        $_SESSION['msg_typ'] = "success";
        header("location: cart.php");
    }

    // Man vill ta bort en cart
    if (isset($_GET['bort'])) {
        $id = intval ($_GET['bort']) or die ("hacker n00b");
        $sql = "DELETE FROM Cart WHERE Cart_ID=$id";
        $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Cart har tagits bort.";
        $_SESSION['msg_typ'] = "danger";
        header("location: cart.php");
    }

    // Man har valt en Cart att editera. Hämta in gammalt namn på denne
    if (isset($_GET['editera'])) {
        $id = intval($_GET['editera']) or die ("hacker n00b");
        $sql = "SELECT * FROM Cart WHERE Cart_ID=$id";
        $result = $link->query ($sql) or die($link->error());
        $person = $result->fetch_array();
        $old_namn = $person['Cart_Namn'];
        $old_id = $person['Cart_ID'];
        $update = true;
    }
    
    // Man har fyllt i det nya namnet för carten
    if (isset($_POST['uppdatera'])) {
        $id = intval($_POST['id']) or die ("hacker n00b");
        $namn = htmlentities ($_POST['namn'], ENT_QUOTES);
        $sql = "UPDATE Cart SET Cart_Namn='$namn' WHERE Cart_ID=$id";
        $result = $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Cart har uppdaterats.";
        $_SESSION['msg_typ'] = "info";
        header("location: cart.php");
    }

?>
