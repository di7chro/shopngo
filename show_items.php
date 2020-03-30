<?php require_once 'inc_header.php' ?>

    <h1>Visar alla Items som finns.</h1>
<?php 
    require_once 'inc_dbconnect.php';
    $sql_item = "SELECT * FROM Item;";
    $result_item = $link->query($sql_item) or die ("Kunde inte ställa frågan att hämta Items."); ?>
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Namn</th>
          </tr>
        </thead>
        <tbody>
    <?php
    while ($item = mysqli_fetch_array($result_item)) { ?>
        <tr>
            <th scope="row"><?php echo $item['Item_ID']?></th>
            <td><?php echo $item['Namn']?></td>
        </tr>
    <?php } ?>

    </tbody>
    </table>

<?php require_once 'inc_footer.php' ?>