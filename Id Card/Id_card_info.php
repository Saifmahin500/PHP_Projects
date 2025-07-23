<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ID Card Information Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background: white;
      padding: 25px 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      width: 350px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    input[type="submit"] {
      background-color: #007BFF;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      margin-top: 15px;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>

  <form action="id.php" method="post" enctype="multipart/form-data">
    <h2>ID Card Info</h2>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="course">Course:</label>
    <input type="text" id="course" name="course" required>

    <label for="batch">Batch No:</label>
    <input type="text" id="batch" name="batch" required>

    <label for="course">Upload Image:</label>
    <input type="file" id="img" name="upload_image" required>

    <input type="submit" value="Generate ID" name="btn">
  </form>

</body>

</html>