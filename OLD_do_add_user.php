<?php session_start();

if (isset($_POST['spara'])) {
        $username = htmlentities($_POST['user'], ENT_QUOTES);
        $password = htmlentities($_POST['pass'], ENT_QUOTES);
        $color = htmlentities($_POST['color'], ENT_QUOTES);
        $sql = "INSERT INTO Members (Username, Password, Color) VALUES('$username', '$password', '$color')";
        $link->query ($sql) or die($link->error());
        $_SESSION['meddelande'] = "Personen har blivit sparad.";
        $_SESSION['msg_typ'] = "success";
        header("location: add_user.php");
    }
?>


<p>Dessa finns redan</p>
<?php 
    require_once '../includes/dbconnect.php';
    $sql_users = "SELECT * FROM User;";
    $result_users = $link->query($sql_users) or die ("Kunde inte ställa frågan att hämta Users."); ?>
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Username</th>
            <th scope="col">Color</th>
          </tr>
        </thead>
        <tbody>
    <?php
    while ($user = mysqli_fetch_array($result_users)) { ?>
        <tr>
            <td><?php echo $user['Username']?></td>
            <td><?php echo $user['Color']?></td>
        </tr>
    <?php } ?>

    </tbody>
    </table>