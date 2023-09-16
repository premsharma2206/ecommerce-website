<?php

require("includes/common.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delete query*/
mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body>
  <?php include("includes/header.php");?>
   	<div class="container-fluid main-container">
	<?php include("includes/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
    <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Orders  / Page <?php echo $page;?> </h1></div><br>
<div class='table-responsive'>  
<div style="overflow-x:scroll;">
<table class="table  table-hover table-striped" style="font-size:18px">
<tr><th>Customer Name</th><th>Products</th><th>Contact </th> <th> Email</th><th>Address</th><th>Price</th><th>Description</th><th>City</th></tr>
<?php 
$result=mysqli_query($con,"select  user.name, product.name, contact, email, address, product.price, product.description,user.city from user_items,items as product,users as user where user_items.item_id=product.id and user.id=user_items.user_id and user_items.status = 'Confirmed'")or die ("query 1 incorrect.....");

while(list($user_name,$product_name,$contact_no,$email,$address,$price,$details,$city)=mysqli_fetch_array($result))
{	
echo "<tr><td>$user_name</td><td>$product_name</td><td>$contact_no</td><td>$email</td><td>$address</td><td>$price</td><td>$details</td><td>$city</td>

<td>
<a class=' btn btn-success' href='orders.php?order_id=$order_id&action=delete'>Delete</a>
</td></tr>";
}
?>
</table>
</div></div>
<nav align="center"> 
<?php 
//counting paging

$paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
$count=mysqli_num_rows($paging);

$a=$count/5;
$a=ceil($a);
echo "<bt>";echo "<bt>";
for($b=1; $b<=$a;$b++)
{
?> 
<ul class="pagination " style="border:groove #666">
<li><a class="label-info" href="orders.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li></ul>
<?php	
}
?>
</nav>
</div></div>
<?php include("include/js.php");?>
</body>
</html>