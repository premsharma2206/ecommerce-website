<?php

// This page updates the user password
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
$name1=$_POST['pname'];
$price1=$_POST['price'];
$d1=$_POST['desc'];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
 $query1 = "UPDATE  items SET name = '" . $name1 . "' WHERE id = '" . $item_id . "'";
         $query2 = "UPDATE  items SET price = '" . $price1 . "' WHERE id = '" . $item_id . "'";
         $query3 = "UPDATE  items SET description = '" . $d1 . "' WHERE id = '" . $item_id . "'";
        mysqli_query($con, $query1) or die($mysqli_error($con));
         mysqli_query($con, $query2) or die($mysqli_error($con));
          mysqli_query($con, $query3) or die($mysqli_error($con));
        header('location: edit.php?error=Updated');
}

?>