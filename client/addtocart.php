<?php

/*

start session
get pid $_GET
extract the cart varibale from session

check the pid is already available in cart array-
if available throw error 'item already in cart'
if not available push the pid into cart array - 

update the cart into the session

redirect to view_products.php

*/


session_start();
$pid = $_GET['pid'];

$local_cart = $_SESSION['cart'];

$res = in_array($pid, $local_cart);

echo "<h1>$res</h1>";

if ($res) {
    echo "<h1>Already in cart</h1>";
    echo "<a href='view_products.php'>Back to Products </a>";
} else {
    array_push($local_cart, $pid);
    $_SESSION['cart'] = $local_cart;
    header(header: 'location:view_products.php');
}


?>