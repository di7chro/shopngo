<?php session_start(); ?>
<?php include_once 'inc_header.php' ?>
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
    include_once 'inc_dbconnect.php'; 
    include_once 'cart_backend.php'; 
    $result = $link->query("SELECT * FROM Cart");
?>
<h1>Mina carts</h1>

<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Namn</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['Cart_ID']; ?></td>
            <td><?php echo $row['Cart_Namn']; ?></td>
            <td>
                <a href="cart.php?editera=<?php echo $row['Cart_ID'];?>" class="btn btn-info">Editera</a>
                <a href="cart_backend.php?bort=<?php echo $row['Cart_ID'];?>" class="btn btn-danger">Ta bort</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
<div class="row justify-content-center">
    <form action="cart_backend.php" method="POST">
        <div class="form-group">
            <label for="namn">Cart Namn</label>
            <input type="text" class="form-control" name="namn" value="<?php echo $old_namn ?>"
                placeholder="Skriv in Cart Namn">
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
<?php include_once 'inc_footer.php' ?>
