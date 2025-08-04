<?php

include("function.php");

$objShopAdmin = new shop();

$display_products = $objShopAdmin->display_data();

if (isset($_GET["status"])) {
    if ($_GET["status"] = "edit") {
        $id = $_GET["id"];
        $return_update_product = $objShopAdmin->update_data($id);
    }
}

if (isset($_POST["update_btn_product"])) {
    $msg =  $objShopAdmin->edit_data($_POST);
    $_SESSION["msg"] = $msg;
    header("Location: index.php");
    exit();
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #ffffff);
            font-family: 'Segoe UI', sans-serif;
        }

        .form-card {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: auto;
        }

        .form-title {
            font-size: 32px;
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
        }

        .btn-custom {
            background: #0d6efd;
            color: white;
            font-weight: 600;
            padding: 12px 35px;
            border-radius: 12px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background: #084298;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="form-card">

            <h2 class="text-center form-title">🛠️ Update Product</h2>

            <!-- ✅ Success Message -->
            <?php
            session_start();
            if (isset($_SESSION["msg"])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                    . $_SESSION["msg"] .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
                unset($_SESSION["msg"]);
            }
            ?>

            <!-- ✅ Product Form -->
            <form class="row g-4" action="" method="post" enctype="multipart/form-data">

                <div class="col-md-6">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="edit_p_name" value="<?php echo $return_update_product['product_name']  ?>" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Upload Image</label>
                    <input type="file" class="form-control" name="edit_p_img" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control" name="edit_p_stock" value="<?php echo $return_update_product['product_stock']  ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" step="0.01" name="edit_p_price" value="<?php echo $return_update_product['product_price']  ?>"" required>
                </div>

           
                <div class=" col-md-6">
                    <label class="form-label fw-bold">Product Category</label>
                    <input type="text" class="form-control" name="p_category" value="<?php echo $return_update_product['category']  ?>" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Category ID</label>
                    <input type="number" class="form-control" name="edit_p_category_id" value="<?php echo $return_update_product['category_id']  ?>" required>
                </div>

                <input type="hidden" name="edit_p_id" value="<?php echo $return_update_product['id']  ?>">

                <div class="col-12 text-center mt-4">
                    <button type="submit" name="update_btn_product" class="btn btn-custom shadow">🔄 Update Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>