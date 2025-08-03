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
            return "Product added successfully";
        }
    }
}
