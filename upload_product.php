<?php

include_once './shared/connection.php';


if(!isset($_FILES['pdt_image']) &&  !isset($_POST['name']) && !isset($_POST['price']))
{
    echo "<h3>Server Validation is Failed</h3>";
    die;
}

$img=$_FILES['pdt_image'];
$error=$img['error'];

if($error==1)
{
    echo"<h3>Upload Failed Try again</h3>";
    die;
}

$tmp_name=$img['tmp_name'];

date_default_timezone_set('Asia/Kolkata');
$date_str=date('Y-m-d H:i:s').'.jpg';

if(move_uploaded_file($tmp_name,"../images/$date_str")){
    echo "File successfully uploaded and moved.";
}else{
    echo "Error moving file: " . $_FILES['uploaded-img']['error'];
}


$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];


$cmd="insert into products(name,price,details,imname) values('$name',$price,'$details','$date_str')";

$sql_status=mysqli_query($conn,$cmd);

if($sql_status)
{
    header('location:upload_product_fe.php');    
}
else
{
    echo "Error in SQL syntax";
}




?>