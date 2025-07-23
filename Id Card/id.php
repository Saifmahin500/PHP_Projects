<?php
if (isset($_POST["btn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $course = $_POST["course"];
    $batch = $_POST["batch"];
    $image = $_FILES["upload_image"]["name"];
    $tmp_name = $_FILES["upload_image"]["tmp_name"];
    move_uploaded_file($tmp_name, "img_file/" . $image);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Card Info</title>
    <style>
        .id-card {
            display: block;
            /* or use none to hide initially */
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            padding: 20px;
            width: 350px;
            text-align: center;
            position: relative;
            margin: 20px auto;
        }

        .id-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 2px solid #007BFF;
        }

        .id-card h3 {
            margin: 10px 0 5px;
            color: #333;
            font-size: 22px;
        }

        .id-card p {
            margin: 5px 0;
            color: #555;
            font-size: 15px;
        }

        .id-card .badge {
            background: #007BFF;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="id-card" id="idCard">
        <img src="img_file/<?php if (isset($image)) {
                                echo $image;
                            } ?>" alt="Profile Photo">

        <h3 id="cardName"><?php if (isset($name)) {
                                echo $name;
                            }  ?></h3>
        <p id="cardEmail">Email:<?php if (isset($email)) {
                                    echo $email;
                                }  ?></p>
        <p id="cardPhone">Phone:<?php if (isset($phone)) {
                                    echo $phone;
                                }  ?></p>
        <p id="cardCourse">Course Name :<?php if (isset($course)) {
                                            echo $course;
                                        }  ?></p>
        <span class="badge" id="cardBatch">Batch No : <?php if (isset($batch)) {
                                                            echo $batch;
                                                        }  ?></span>
    </div>


</body>

</html>