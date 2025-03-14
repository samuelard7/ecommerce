<?php

$conn=new mysqli('localhost','root','','acme_apr');

if($conn->connect_error)
{
    echo "<h1>Connection Error!</h1>";
    die;
}

?>
