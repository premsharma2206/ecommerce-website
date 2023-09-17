<?php


require("includes/common.php");


if(isset($_POST['submit']))
{
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$product_type = $_POST['product_type'];
$tags = $_POST['tags'];
// $c_price=$_POST['c_price'];
// $product_type=$_POST['product_type'];
// $tags=$_POST['tags'];
$filename = $_FILES["picture"]["name"];
$image = $_FILES["picture"]["tmp_name"];
$folder = "img";
//picture coding
$query="insert into items(name,price,description,images,product_type,tags) values ('$product_name',$price,'$details','$folder','$product_type','$tags')";	
mysqli_query($con, $query);
        if (move_uploaded_file($image, $folder))  {
            echo "Image uploaded successfully";
        }else{
            echo "Failed to upload image";
      }
// if(mysqli_query($con,$query)){
//      header("location: submit_form.php?success=1");
// }
// else{
//     echo 'Unsuccessful';
// }




mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Bhawani Emporium</title>
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="../js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
          <style>
         table, th, td {
            border: 1px solid black;
         }
      </style>
    </head>
    <body style="padding-top: 50px;">
        <!-- Header -->
        <?php
        include 'includes/header.php';
        ?>

   	<div class="container-fluid">
	<?php include("includes/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
  	<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#c4e17f">
	<h1><span class="glyphicon glyphicon-tag"></span> Product / Add Product  </h1></div><br>
	<div class="panel-body" style="background-color:#E6EEEE;">
		<div class="col-lg-7">
        <div class="well">
        <form action="add_product.php" method="post" name="form" enctype="multipart/form-data">
        <p>Title</p>
        <input class="input-lg thumbnail form-control" type="text" name="product_name" id="product_name" autofocus style="width:100%" placeholder="Product Name" required>
<p>Description</p>
<textarea class="thumbnail form-control" name="details" id="details" style="width:100%; height:100px" placeholder="write here..." required></textarea>
<p>Add Image</p>
<div style="background-color:#CCC">
<input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" >
</div>
</div>
<div class="well">
<h3>Pricing</h3>
<p>Price</p>
<div class="input-group">
      <div class="input-group-addon">Rs</div>
      <input type="text" class="form-control" name="price" id="price"  placeholder="0.00" required>
    </div><br>


    </div>
        </div>  
        <div class="col-lg-5">
        <div class="well">
<h3>Category</h3>  
<p>Product type</p>
<input type="text" name="product_type" id="product_type" class="form-control" placeholder="">
<br>
<p>Other tags</p>
<input type="text" name="tags" id="tags" class="form-control" placeholder="">
</div>          
</div>

<div align="center">
    
    
    <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px""> Add Product</button>
    </div>
        </form>
    </br>
    </br>
    <div align="center">
        <a href="products1.php">
    <button type="submit" name="Cancel" value = "Cancel" id="Cancel" class="btn btn-default" style="width:100px; height:60px">Cancel</button>
    </a>
      </div>
 
	</div>
</div></div></div>
<!--<?php include("include/js.php"); ?>-->
</body>
</html>