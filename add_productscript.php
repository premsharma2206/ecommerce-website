           
          
       
<?php

require("includes/common.php");
if(isset($_POST['submit'])) {
    $name=  $_POST['pname'];
    $price= $_POST['price'];
    $d= $_POST['desc'];
    //Process the image that is uploaded by the user


    $image=addslashes(file_get_contents($_FILES["imageUpload"]["tmp_name"]));
    //storind the data in your database
    $query= "INSERT INTO items(name,price,description,images) VALUES ('$name','$price','$d','$image')";
   if(mysqli_query($con, $query))
   {
       echo '<script>alert("Image inserted into database.")</script>';
   }
   header('location: add_product.php');
}
?>