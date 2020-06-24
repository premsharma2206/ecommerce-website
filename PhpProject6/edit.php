 <?php
include 'includes/common.php';
//require_once("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Product | Bhawani Emporium</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4" id="settings-container">
                    <h4>Edit Product</h4>
                    <?php
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $i=$_GET['id'];
                    echo '<form action="edit_script.php?id='.$i.'" method="POST">';
                            ?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="pname"  placeholder="name">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="price" placeholder="new price" >
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="desc"  placeholder="New description"></textarea>
                        </div>
      <?php          echo'<button class="btn btn-primary">Change</button>';   ?>
                        <?php
                         if(isset($_GET['error']))
                         {
                        echo "<br><br><b class='red'>".$_GET['error']."</b>";
                         }
                    }
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </body>
</html>