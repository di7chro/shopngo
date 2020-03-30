<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop 'n Go Exempel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Shop'nGo</a>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">User</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Show</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="show_users.php">Users</a>
                            <a class="dropdown-item" href="show_carts.php">Carts</a>
                            <a class="dropdown-item" href="show_items.php">Items</a>
                            <a class="dropdown-item" href="show_all_cart-items.php">Alla CartItems</a>
                            <a class="dropdown-item" href="show_item_in_usercart.php">Item i UserCart</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Add</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="add_user.php">User</a>
                        <a class="dropdown-item" href="add_item.php">Item</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">User</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="add_user.php">User</a>
                        <a class="dropdown-item" href="add_item.php">Item</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" class="container">