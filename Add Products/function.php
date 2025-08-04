<?php

class shop
{
    private $conn;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "shopdb";

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {
            die("Database connction Error");
        }
    }

    public function add_product($data)
    {
        $p_name = $data["p_name"];
        $p_img = $_FILES["p_img"]["name"];
        $tmp_name = $_FILES["p_img"]["tmp_name"];
        $p_stock = $data["p_stock"];
        $p_price = $data["p_price"];
        $p_category = mysqli_real_escape_string($this->conn, $data["p_category"]);
        $p_category_id = $data["p_category_id"];

        $quary = "INSERT into Products(product_name,product_image,product_stock,
        product_price,category,category_id) Values ('$p_name','$p_img',$p_stock,$p_price,'$p_category',$p_category_id)";

        if (mysqli_query($this->conn, $quary)) {
            move_uploaded_file($tmp_name, 'upload/' . $p_img);
            return "Product added successfully";
        }
    }

    public function display_data()
    {
        $quary = "SELECT * FROM products";

        if (mysqli_query($this->conn, $quary)) {
            $returnData = mysqli_query($this->conn, $quary);
            return $returnData;
        }
    }

    public function update_data($id)
    {
        $quary = "SELECT * FROM products WHERE id = $id";

        if (mysqli_query($this->conn, $quary)) {
            $returnData = mysqli_query($this->conn, $quary);
            $update_pro_data = mysqli_fetch_assoc($returnData);
            return $update_pro_data;
        }
    }

    public function edit_data($data)
    {
        $p_name = $data["edit_p_name"];
        $p_img = $_FILES["edit_p_img"]["name"];
        $tmp_name = $_FILES["edit_p_img"]["tmp_name"];
        $p_stock = $data["edit_p_stock"];
        $p_price = $data["edit_p_price"];
        $p_category = mysqli_real_escape_string($this->conn, $data["edit_p_category"]);
        $p_category_id = $data["edit_p_category_id"];
        $idno = $data["edit_p_id"];

        $quary = "UPDATE products SET product_name='$p_name ', product_image='$p_img',product_stock = '$p_stock',product_price ='$p_price', category= '$p_category', category_id= '$p_category_id'  where id= $idno";

        if (mysqli_query($this->conn, $quary)) {
            move_uploaded_file($tmp_name, 'upload/' . $p_img);
            return "Products Updated Successfully";
        }
    }
}
