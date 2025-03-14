<?php

include_once '../shared/connection.php';

$name=$_POST['name'];
$password=$_POST['password'];

// $hashed_password=md5($password);
// echo "Hashed=$hashed_password";

$mobile=$_POST['mobile'];
$address=$_POST['address'];

$cmd="insert into clients(name,password,mobile,address)
values('$name','$password','$mobile','$address')";
$sql_status=mysqli_query($conn,$cmd);
if($sql_status)
{
    header('location:login.html');
}
else
{
    echo "<h3>registration Failed/User already registered</h3>";
}




?>