<?php
include_once("dbconnect.php"); //database

if (isset($_GET['submit'])) { //get database
        $prname = addslashes($_GET['prname']);
        $prprice = addslashes($_GET['prprice']);
        $prqty = addslashes($_GET['prqty']);
        $prtype = addslashes($_GET['prtype']);
        if ($prtype == "noselection") {
            echo "<script> alert('Please select product type')</script>"; //if noy select product
        } else {//insert to database tbl_products
            $sqlinsert = "INSERT INTO tbl_products(prname,prprice,prqty,prtype) VALUES('$prname','$prprice','$prqty','$prtype')";
            try {
                $conn->exec($sqlinsert);
                echo "<script> alert('Successfully Updated')</script>"; //done add
                echo "<script> window.location.replace('../index.php')</script>";
            } catch (PDOException $e) {
                echo "<script> alert('Failed')</script>"; //fail to add
        }}} 
function uploadImage($email)
{
    $target_dir = "../images/"; //image file upload
    $target_file = $target_dir . $prname . ".png";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>New Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <!--css style reference-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <h1>My Shop</h1>
        <p>"Don’t worry, we have it"</p>

    </div>
    <div class="topnavbar" id="myTopnav">
        <!--top navigation bar-->
        <a href="../index.php">Return</a>
    </div>
    <div class="main">
        <div class="row-single">
            <div class="card-header" type="submit">
                <h3>Fill In the Product Details</h3>
            </div><br><br>

            <form name="questionForm" action="newproduct.php" onsubmit="return validateNewQForm()" method="get">
                <div class="row">
                    <div class="col-25">
                        <label for="topics">Product Type</label>
                    </div>
                    <div class="col-75">
                        <select name="prtype" id="idtopic" required>
                            <!--fill details for product type-->
                            <option value="">Please Select Product Type</option>
                            <option value="bicycle">Bicycle</option>
                            <option value="skateboard">Skateboard</option>
                            <option value="hoverboard">Hoverboard</option>
                            <option value="scooter">Scooter</option>
                            <option value="drone">Drone</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-25">
                        <!--product name-->
                        <label for="lnamea">Product Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="prname" placeholder="Enter Product Name" required>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-25">
                        <!--product price-->
                        <label for="lnameb">Product Price (RM)</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="prprice" placeholder="Enter Product Price" required>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-25">
                        <!--product quantity-->
                        <label for="lnamec">Product Quantity</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="prqty" placeholder="Enter Product Quantity" required>
                    </div>
                </div>
                <br><br>
                <div>
                    <form name="uploadPhoto" action="newproduct.php" onsubmit="return validateUpdForm()" method="post"
                        enctype="multipart/form-data">
                        <!--upload photo-->
                        <img class="imgselection" class="circular--portrait" src="../images/.jpg ?"><br>
                        <input type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload"
                            accept="image/*"><br>
                </div>
                <br>
                <!--submit button-->
                <div><input type="submit" name="submit" value="Submit"></div>
                <br>
            </form>
        </div>
    </div>
    <!--bottom navigation bar-->
    <div class="bottomnavbar">
        <a> </a>
    </div>
</body>

</html>