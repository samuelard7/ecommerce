<?php

session_start();

include_once '../shared/connection.php';

$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cmd="select * from clients where mobile='$mobile' and password='$password'";
$sql_obj=mysqli_query($conn,$cmd);

$row_length=mysqli_num_rows($sql_obj);

if($row_length==1)
{
    $_SESSION['login']=true;
    $_SESSION['cart']=array();
    
    header('location:view_products.php');
}
else
{
    $_SESSION['login']=false;
    echo "<h3>Invalid Credentials</h3>";
}

?>