<?php


/*

View the Items added in CART
------------------------------

start the session
get the pids from session cart

connect to mysql

loop the local_cart
get the pid from cart
query the db w.r.t each pid
fetch the product

render it as HTML
calculate the Total

*/

session_start();

include 'menu.php';

include_once '../shared/connection.php';


$local_cart = $_SESSION['cart'];

$res = implode(",", $local_cart);

$cmd = "select * from products where pid in ($res)";

$sql_obj = mysqli_query($conn, $cmd);

$total_rows = mysqli_num_rows($sql_obj);

echo "<br>";
$total_price = 0;

echo "<div class='d-flex'>";

echo "<div class='w-75  d-flex flex-wrap justify-content-start '>";
for ($i = 0; $i < $total_rows; $i++) {
    $row = mysqli_fetch_assoc($sql_obj);
    $pid = $row['pid'];
    $name = $row['name'];
    $price = $row['price'];
    $details = $row['details'];
    $imname = $row['imname'];

    echo "<div class='card mt-5' style='width:200px'>
                <img class='card-img-top' src='../db_uploaded_images/$imname' alt='Card image'>
                <div class='card-body'>
                    <h4 class='card-title'>$name  <span class='text-danger'>$price Rs </span></h4>
                    <p class='card-text'>$details</p>
                    <div class='d-flex justify-content-between'>                
                    <a href='addtocart.php?pid=$pid' > <button class='btn btn-warning'> Remove from Cart </i>  </button>  </a>                                      
                    </div>
                </div>
            </div>";

    $total_price += $row['price'];


}
echo "</div>";


echo "<div class='w-25 bg-success text-white'>

        <h2>Total Price=$total_price Rs</h2>
</div>";

echo "</div>";



?>