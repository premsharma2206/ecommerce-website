<?php
require("includes/common.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products | Bhawani Emporium</title>
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
        <div class="container" id="content">
            <!-- Jumbotron Header -->
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Welcome to Bhawani Emporium!</h1>

            </div>
            <hr>
            
            <?php $j=3; ?>
         <div class="row text-center" id="cameras">
                <?php
                $query="select * from items";
                $result= mysqli_query($con, $query);
                if(mysqli_num_rows($result)>0){
                    while ($row2 = mysqli_fetch_array($result)) {
                ?>
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <?php $i=$row2['id'];  
                        echo '<a href="picture.php?id='.$i.'" name="view" value="view">';
                           $n=$row2['name'];
                           $q="select * from items where name='$n'";
                           if($res= mysqli_query($con, $q))
                           {
                               while ($row1 = mysqli_fetch_array($res)) {
                                   echo '<img src="data:image/jpeg;base64,'.base64_encode($row1['images'] ).'" />';
                                   $j--;
                               }
                           }
                           
                        ?>
                           </a>
                        <div class="caption">
                            
                            <h3><?php $select="select * from items where name='$n'";
                                 $result1= mysqli_query($con, $select);
        
                                while($row = mysqli_fetch_array($result1)) {
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
                               
                            $i=$row2['id'];
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart($i)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                   $i=$row2['id'];
                                   echo '<a href="cart-add.php?id='.$i.'" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>';
                                   
                                }
                            }
                            if($j<=0){
                                   echo '</div>';
                                   echo '</div>';
                                   echo '</div>';
                                    echo '</div>';
                                echo '<div class="row text-center" id="cameras">';
                                $j=3;
                            }
 else {
                                   echo '</div>';
                                   echo '</div>';
                                   echo '</div>';
                                   
 }
                } }
 echo '</div>';
                            ?>

       

        <?php include("includes/footer.php"); ?>
    </body>

</html>