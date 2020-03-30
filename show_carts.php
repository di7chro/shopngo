<?php require_once 'inc_header.php' ?>

<h1>Visar alla Carts som finns.</h1>
<?php 
    require_once 'inc_dbconnect.php';
    $sql_cart = "SELECT * FROM Cart;";
    $result_cart = $link->query($sql_cart) or die ("Kunde inte ställa frågan att hämta Carts."); ?>
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Namn</th>
          </tr>
        </thead>
        <tbody>
    <?php
    while ($cart = mysqli_fetch_array($result_cart)) { ?>
        <tr>
            <th scope="row"><?php echo $cart['Cart_ID']?></th>
            <td><?php echo $cart['Cart_Namn']?></td>
        </tr>
    <?php } ?>

    </tbody>
    </table>

<?php require_once 'inc_footer.php' ?>