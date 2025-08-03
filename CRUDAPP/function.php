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

    public function display_data_by_id($id)
    {
        $quary = "select * from students where id = $id";

        if (mysqli_query($this->conn, $quary)) {
            $returnData = mysqli_query($this->conn, $quary);

            $studentData = mysqli_fetch_assoc($returnData);
            return $studentData;
        }
    }

    public function update_data($data)
    {
        $std_name = $data['edit_std_name'];
        $std_roll = $data['edit_std_roll'];
        $idno = $data['std_id'];
        $std_img = $_FILES['edit_std_img']['name'];
        $tmp = $_FILES["edit_std_img"]["tmp_name"];

        $quary = "UPDATE students set std_name='$std_name', std_roll='$std_roll',std_img='$std_img' where id=$idno";

        if (mysqli_query($this->conn, $quary)) {
            move_uploaded_file($tmp, 'upload/' . $std_img);
            return "information updated successfully";
        }
    }

    public function delete_data($id)
    {
        $catch_img = "SELECT * FROM students WHERE id = $id";
        $delete_std_info = mysqli_query($this->conn, $catch_img);
        $std_info = mysqli_fetch_assoc($delete_std_info);
    
        // Check if image exists and is a file
        if (!empty($std_info['std_img'])) {
            $dlt_imgData = $std_info["std_img"];
            $image_path = "upload/" . $dlt_imgData;
    
            if (file_exists($image_path) && is_file($image_path)) {
                unlink($image_path); // ✅ Only delete if it's a real file
            }
        }
    
        $quary = "DELETE FROM students WHERE id = $id";
        if (mysqli_query($this->conn, $quary)) {
            return "Deleted Successfully";
        }
    }
    
}
