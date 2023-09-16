<?php

include("includes/common.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
mysqli_query($con,"delete from user where id='$user_id'")or die("query is incorrect...");
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
<?php include("includes/header.php"); ?>

<div class="container-fluid">

<?php include("includes/side_bar.php"); ?>
<div class="col-sm-9" style="margin-left:10px"> 
<div class="panel-heading" style="background-color:#c4e17f">
	<h1>Manage User </h1></div><br>

<div style="overflow-x:scroll;">
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
			    <th>User Name</th>
                <th>User Password</th>
	<th><a href="add_user.php">Add New</a></th></tr>	
<?php 
$result=mysqli_query($con,"select id, email, password from users")or die ("query 2 incorrect.......");

while(list($user_id,$user_name,$user_password)=
mysqli_fetch_array($result))
{
echo "<tr><td>$user_name</td><td>$user_password</td>";

echo"<td>
<a href='edit_user.php?user_id=$user_id'>Edit</a>
<a href='manage_users.php?user_id=$user_id&action=delete'>Delete</a>
</td></tr>";
}
mysqli_close($con);
?>
</table>
</div>	
</div></div>
<?php include("includes/js.php"); ?>
</body>
</html>