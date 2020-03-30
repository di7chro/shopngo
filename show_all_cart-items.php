<?php require_once 'inc_header.php' ?>

    <h1>Visar innehållet i alla Carts.</h1>
<?php 
    require_once 'inc_dbconnect.php';
    $sql_cartitems = "SELECT Cart.Cart_Namn AS Cart_Name, Item.Namn AS Item_Name\n"
    . "FROM Cart, Item, CartItem\n"
    . "WHERE \n"
    . "  Cart.Cart_ID = CartItem.Cart_ID AND \n"
    . "  Item.Item_ID = CartItem.Item_ID";

    $result_cartitems = $link->query($sql_cartitems) or die ("Kunde inte ställa frågan att hämta Items."); ?>
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Cart_Name</th>
            <th scope="col">Item_Name</th>
          </tr>
        </thead>
        <tbody>
    <?php
    while ($cartitem = mysqli_fetch_array($result_cartitems)) { ?>
        <tr>
            <th scope="row"><?php echo $cartitem['Cart_Name']?></th>
            <td><?php echo $cartitem['Item_Name']?></td>
        </tr>
    <?php } ?>

    </tbody>
    </table>

<?php require_once 'inc_footer.php' ?>