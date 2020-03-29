<?php session_start(); ?>
<?php include_once '../includes/header.php' ?>
<!--  -->
<!--  -->
<!-- Christian Ohlsson 2020-03-29 -->
<?php if (isset($_SESSION['meddelande'])): ?>
<div class="alert alert-<?php echo $_SESSION['msg_typ']; ?>">
    <?php
        echo $_SESSION['meddelande'];
        unset ($_SESSION['meddelande']);
    ?>
</div>
<?php endif ?>

<?php 
    // Hämta ut info för att visa upp medlemmarna
    include_once '../includes/dbconnect.php'; 
    $result = $link->query("SELECT * FROM User");
?>
<h1>Mina Users</h1>

<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Color</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Color']; ?></td>
            <td>
                <a href="user.php?editera=<?php echo $row['id'];?>" class="btn btn-info">Editera</a>
                <a href="user_backend.php?bort=<?php echo $row['id'];?>" class="btn btn-danger">Ta bort</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
<div class="row justify-content-center">
    <form action="backend.php" method="POST">
        <div class="form-group">
            <label for="namn">Namn</label>
            <input type="text" class="form-control" name="namn" value="<?php echo $old_namn ?>"
                placeholder="Skriv in ditt namn">
        </div>
        <div class="form-group">
            <label for="plats">Color</label>
            <input type="color" class="form-control" name="color" value="<?php echo $old_color ?>"
                placeholder="Skriv in din färg">
        </div>
        <div class="form-group">
            <?php if ($update == true): ?>
            <button type="submit" class="btn btn-info" name="uppdatera">Uppdatera</button>
            <input type="hidden" name="id" value="<?php echo $old_id ?>">
            <?php else: ?>
            <button type="submit" class="btn btn-primary" name="spara">Lägg till</button>
            <?php endif; ?>
        </div>
    </form>
</div>
<?php include_once '../includes/footer.php' ?>
