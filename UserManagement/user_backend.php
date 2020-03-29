<?php
    // Starta igång sessioner om det inte redan startats
    if(!isset($_SESSION))
        session_start();

    // Initiera lite variabler så att vi inte får felmeddelanden vid uppdatering
    $old_namn = '';
    $old_color = '';
    $old_id = 0;
    $update = false;

    // Man vill lägga till en ny person
    if (isset($_POST['spara'])) {
        $namn = htmlentities($_POST['namn'], ENT_QUOTES);
        $plats = htmlentities($_POST['plats'], ENT_QUOTES);
        $sql = "INSERT INTO Members (Namn, Plats) VALUES('$namn', '$plats')";
        $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Personen har blivit sparad.";
        $_SESSION['msg_typ'] = "success";
        header("location: index.php");
    }

    // Man vill ta bort en person
    if (isset($_GET['bort'])) {
        $id = intval ($_GET['bort']) or die ("hacker n00b");
        $sql = "DELETE FROM Members WHERE id=$id";
        $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Personen har tagits bort.";
        $_SESSION['msg_typ'] = "danger";
        header("location: index.php");
    }

    // Man har valt en person att editera. Hämta in gammalt namn och plats på denne
    if (isset($_GET['editera'])) {
        $id = intval($_GET['editera']) or die ("hacker n00b");
        $sql = "SELECT * FROM Members WHERE id=$id";
        $result = $link->query ($sql) or die($link->error());
        $person = $result->fetch_array();
        $old_namn = $person['Namn'];
        $old_plats = $person['Plats'];
        $old_id = $person['id'];
        $update = true;
    }
    
    // Man har fyllt i det nya namnet och platsen för personen
    if (isset($_POST['uppdatera'])) {
        $id = intval($_POST['id']) or die ("hacker n00b");
        $namn = htmlentities ($_POST['namn'], ENT_QUOTES);
        $plats = htmlentities($_POST['plats'], ENT_QUOTES);
        $sql = "UPDATE Members SET Namn='$namn', Plats='$plats' WHERE id=$id";
        $result = $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Personen har uppdaterats.";
        $_SESSION['msg_typ'] = "info";
        header("location: index.php");
    }

?>
