<?php
session_start();

include("function.php");

$objShopAdmin = new shop();

if (isset($_POST["add_btn_product"])) {
    $return_msg = $objShopAdmin->add_product($_POST);
    $_SESSION["return_msg"] = $return_msg;
    header("Location: index.php");
    exit();
}

$display_products = $objShopAdmin->display_data();


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>

    <!-- ✅ Keep only Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5 p-4 shadow-lg rounded bg-light">
        <h3 class="text-center mb-4 text-primary">🛒 Add a New Product</h3>

        <!-- ✅ Success Message Show from Session -->
        <?php
        if (isset($_SESSION["return_msg"])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                . $_SESSION["return_msg"] .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION["return_msg"]);
        }
        ?>

        <!-- 🔹 Product Form -->
        <form class="row g-3" action="" method="post" enctype="multipart/form-data">

            <div class="col-md-6">
                <label class="form-label fw-bold">Product Name</label>
                <input type="text" class="form-control" name="p_name" placeholder="Enter Product Name" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Upload Image</label>
                <input type="file" class="form-control" name="p_img" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Product Stocks</label>
                <input type="number" class="form-control" name="p_stock" placeholder="Available stock" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Product Price</label>
                <input type="number" class="form-control" name="p_price" placeholder="Enter price" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Product Category</label>
                <input type="text" class="form-control" name="p_category" placeholder="e.g. Electronics" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Category ID</label>
                <input type="number" class="form-control" name="p_category_id" placeholder="Enter category ID" required>
            </div>

            <div class="col-12 text-center mt-4">
                <button type="submit" name="add_btn_product" class="btn btn-success px-5 py-2 fw-bold shadow">➕ Add Product</button>
            </div>
        </form>
    </div>

    <!-- Optional: Product Table -->
    <div class="container my-4 p-4 shadow">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT IMAGE</th>
                    <th>STOCK</th>
                    <th>PRICE </th>
                    <th>Category</th>
                    <th>Category ID</th>
                    <th>ADDED DATE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product_items = mysqli_fetch_assoc($display_products)) {

                ?>
                    <tr>
                        <td><?php echo $product_items['id']; ?></td>
                        <td><?php echo $product_items['product_name']; ?></td>
                        <td><img src="upload/<?php echo $product_items['product_image']; ?>" alt="" width="100px"></td>
                        <td><?php echo $product_items['product_stock']; ?></td>
                        <td><strong>$</strong><?php echo $product_items['product_price']; ?></td>
                        <td><?php echo $product_items['category']; ?></td>
                        <td><?php echo $product_items['category_id']; ?></td>
                        <td><?php echo $product_items['created_at']; ?></td>
                        <td>
                            <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $product_items['id']; ?>">Edit</a>
                            <a class="btn btn-warning" href="#">Delete</a>
                        </td>
                    </tr>
                <?php   }  ?>
            </tbody>
        </table>
    </div>

    <!-- ✅ Bootstrap JS for alert close -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>