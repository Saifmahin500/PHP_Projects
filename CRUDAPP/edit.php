<?php

include("function.php");

$objCrudAdmin = new CrudApp();


$students = $objCrudAdmin->display_data();

if(isset($_GET["status"])) {
    if($_GET["status"]="edit"){
        $id = $_GET["id"];
       $returnData =  $objCrudAdmin->display_data_by_id( $id );
    }

}

if(isset($_POST["edit_btn"])) {
    $msg = $objCrudAdmin->update_data($_POST);



}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>CRUDAPP</title>
</head>

<body>
    <div class="container my-4 p-4 shadow">
        <h3><a href="index.php">Saif IT Students Database</a></h3>
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <?php if (isset($msg)) {
                echo $msg;
            } ?>
            <input class="form-control mb-2" type="text" name="edit_std_name" value="<?php echo $returnData["std_name"];   ?>">
            <input class="form-control mb-2" type="text" name="edit_std_roll" value="<?php echo $returnData["std_roll"];?>" >
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-2" type="file" name="edit_std_img">

            <input type="hidden" name="std_id" value="<?php echo $returnData["id"];?>">

            <input class="form-control bg-warning" type="submit" value="Update Information" name="edit_btn">


        </form>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>