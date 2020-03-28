<?php require_once '../includes/header.php' ?>
    <h1>Speciell fråga med alla tabeller</h1>
    <p>Visar vilka User som har Item(3), som är äpplen, i någon Cart.</p>
<?php 
    require_once '../includes/dbconnect.php';
    // Skriv ut alla Users som har Item_ID=3 (Äpplen) i en Cart (Svar: 2, 3, 5, Crill, Suz, Brum)
    $sql_who_item_in_list = "SELECT User.Username, Cart.Cart_Namn\n"
    . "FROM User, UserCarts, CartItem, Cart\n"
    . "WHERE \n"
    . "	 CartItem.Item_ID=3 AND\n"
    . "	 CartItem.Cart_ID=Cart.Cart_ID AND \n"
    . "  Cart.Cart_ID=UserCarts.Cart_ID AND\n"
    . "  UserCarts.User_ID=User.User_ID";
    $result_who_item_in_list = $link->query($sql_who_item_in_list) or die ("Kunde inte ställa frågan att hämta Items."); ?>
    <table class="table">
        <thead class="thead-light">
          <tr>
          <th scope="col">User_Name</th>
          <th scope="col">Cart_Namn</th>
          </tr>
        </thead>
        <tbody>
    <?php
    while ($person = mysqli_fetch_array($result_who_item_in_list)) { ?>
        <tr>
        <td scope="row"><?php echo $person['Username']?></td>
        <td scope="row"><?php echo $person['Cart_Namn']?></td>
        </tr>
    <?php } ?>

    </tbody>
    </table>

<?php require_once '../includes/footer.php' ?>