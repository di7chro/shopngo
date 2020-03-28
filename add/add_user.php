<?php require_once '../includes/header.php' ?>

<h1>Lägger till en User</h1>
<p>Dessa finns redan</p>
<?php 
    require_once '../includes/dbconnect.php';
    $sql_users = "SELECT * FROM User;";
    $result_users = $link->query($sql_users) or die ("Kunde inte ställa frågan att hämta Users."); ?>
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Color</th>
          </tr>
        </thead>
        <tbody>
    <?php
    while ($user = mysqli_fetch_array($result_users)) { ?>
        <tr>
            <th scope="row"><?php echo $user['User_ID']?></th>
            <td><?php echo $user['Username']?></td>
            <td><?php echo $user['Password']?></td>
            <td><?php echo $user['Color']?></td>
        </tr>
    <?php } ?>

    </tbody>
    </table>

<?php require_once '../includes/footer.php' ?>