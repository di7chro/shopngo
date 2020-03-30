<?php
    // Starta igång sessioner om det inte redan startats
    if(!isset($_SESSION))
        session_start();

    // Initiera lite variabler så att vi inte får felmeddelanden vid uppdatering
    $old_namn = '';
    $old_color = '';
    $old_id = 0;
    $update = false;

    include_once 'inc_dbconnect.php'; 

    // Man vill lägga till en ny person
    if (isset($_POST['spara'])) {
        $namn = htmlentities($_POST['namn'], ENT_QUOTES);
        $plats = htmlentities($_POST['color'], ENT_QUOTES);
        $sql = "INSERT INTO User (Username, Color) VALUES('$namn', '$color')";
        $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Personen har blivit sparad.";
        $_SESSION['msg_typ'] = "success";
        echo "Inne i spara";
        header("location: user.php");
    }

    // Man vill ta bort en person
    if (isset($_GET['bort'])) {
        $id = intval ($_GET['bort']) or die ("hacker n00b");
        $sql = "DELETE FROM User WHERE User_ID=$id";
        $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Personen har tagits bort.";
        $_SESSION['msg_typ'] = "danger";
        echo "Inne i bort";
        header("location: user.php");
    }

    // Man har valt en person att editera. Hämta in gammalt namn och plats på denne
    if (isset($_GET['editera'])) {
        $id = intval($_GET['editera']) or die ("hacker n00b");
        $sql = "SELECT * FROM User WHERE User_ID=$id";
        $result = $link->query ($sql) or die($link->error());
        $person = $result->fetch_array();
        $old_namn = $person['Namn'];
        $old_plats = $person['Color'];
        $old_id = $person['User_ID'];
        $update = true;
        echo "Inne i editera";
    }
    
    // Man har fyllt i det nya namnet och platsen för personen
    if (isset($_POST['uppdatera'])) {
        $id = intval($_POST['id']) or die ("hacker n00b");
        $namn = htmlentities ($_POST['namn'], ENT_QUOTES);
        $plats = htmlentities($_POST['color'], ENT_QUOTES);
        $sql = "UPDATE User SET Username='$namn', Color='$plats' WHERE User_ID=$id";
        $result = $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Personen har uppdaterats.";
        $_SESSION['msg_typ'] = "info";
        echo "Inne i uppdatera";
        header("location: user.php");
    }

?>
