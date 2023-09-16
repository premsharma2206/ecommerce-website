<?php
require("includes/common.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        ?>
                     <center>

        <div class="row text-center" id="cameras">
         <div class="col-md-3 col-sm-6 home-feature">
             <a href="products.php">view all products</a>  <br> <br>
             <div class="thumbnail">
            <?php 
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                           $item_id= $_GET['id'];
                           $q="select * from items where id='$item_id'";
                           if($res= mysqli_query($con, $q))
                           {
                                while ($row1 = mysqli_fetch_array($res)) {
                                   echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['images'] ).'" />';
                               }
                           }
                           
                        ?>
             </div>
         </div>
        <div class="col-md-3 col-sm-6 home-feature">
          <div class="caption">
                            
                            <h3><?php 
                              $res1= mysqli_query($con, $q);
                                while($row = mysqli_fetch_array($res1)) {
                                    echo $row['name'];
                              ?> </h3>
                            <p>
                                <?php
                                echo 'Rs.'.$row['price'].'<br>';
                                echo $row['description'];
                                }
                            ?> 
                                </p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                               
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart($item_id)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                   echo '<a href="cart-add.php?id='.$item_id.'" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>';
                                   
                                }
                            }
            }
                            ?>
        </div>
        </div>
                     </center>
    </body>
</html>