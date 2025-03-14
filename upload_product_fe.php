
<?php

include 'menu.html';

?>


<!DOCTYPE html>
<html lang="en">
<head>
            
    
</head>
<body>


    <div class=" d-flex justify-content-center align-items-center vh-100">

    <form  action="upload_product.php" enctype="multipart/form-data" method="POST" class="w-25 bg-warning p-4 text-center">

        <h3>Upload Image</h3>

        <input required type="text" name="name" placeholder="Product Name" class="mt-3 form-control">
        <input required type="number" name="price" placeholder="Product Price" class="mt-3 form-control">

        <textarea required name="details" placeholder="Product Description"  cols="30" rows="5" class="mt-3 form-control"></textarea>
        

        <input required class="mt-3 form-control" name="pdt_image" type="file" accept="image/*" >

        <input class="mt-3 form-control btn btn-success" type="submit" value="Upload">

    </form>

    </div>
    
</body>
</html>