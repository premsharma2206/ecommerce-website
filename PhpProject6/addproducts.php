

<?php
include 'includes/common.php';
// Redirects the user to products page if logged in.
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add Products | Life Style Store</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include 'includes/header.php'; ?>
        <div id="content">
            <div class="container-fluid decor_bg" id="add-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>Add Products</h4>
                            </div>
                            <div class="panel-body">
                                <a href="products1.php">Goto products page.</a>
                                <form action="add_productscript.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Add image</label>
                                         <input type="file" name="imageUpload" id="imageUpload">
                                    </div>
                                    <div class="form-group">
                                          <label>Product name</label> <br>
                                          <input type="text" class="form-control" name="pname" id="pname" required="true">
        
                                    </div>
                                    <div class="form-group">
                                            <label>Price</label> <br>
                                            <input type="number" class="form-control" name="price" id="price" required="true">
                                    </div>
                                     <div class="form-group">
                                          <label>Description</label> <br>
                                          <textarea class="form-control" rows="4" cols="50" name="desc" id="desc" ></textarea>
        
                                    </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary" value="submit">Add product</button><br><br>
                          <?php 
                          if(isset($_GET['error']))
                          {
                          echo $_GET['error']; } ?>
                                </form><br/>
                           
                            </div>
                                    
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
    </body>
</html>
