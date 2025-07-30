<?php

class crudApp
{
    private $conn;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "crudapp";

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {

            die("database connection error" . mysqli_connect_error());
        }
    }

    public function add_data($data)
    {
        $std_name = $data["std_name"];
        $std_roll = $data["std_roll"];
        $std_img = $_FILES["std_img"]["name"];
        $tmp = $_FILES["std_img"]["tmp_name"];

        $quary = "insert into students(std_name,std_roll,std_img) 
        value ('$std_name',$std_roll,'$std_img')";

       

        if (mysqli_query($this->conn, $quary)) {
            move_uploaded_file($tmp, 'upload/' . $std_img);
            return "information added successfully";
        }
    }
    public function display_data()
    {
        $quary = "select * from students";

        if (mysqli_query($this->conn, $quary)) {
            $returnData = mysqli_query($this->conn, $quary);

            return $returnData;
        }
    }
}
