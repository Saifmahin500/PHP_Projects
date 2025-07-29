<?php
$weather = "";
$error = "";

if (isset($_GET['city'])) {
    $city = urlencode($_GET['city']);
    $apiKey = "8fe77b99c9b3d2b3d14cc4fec7c04678";
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

    $response = @file_get_contents($apiUrl);
    if ($response !== false) {
        $data = json_decode($response, true);
        if ($data['cod'] == 200) {
            $weather = [
                'icon' => $data['weather'][0]['icon'],
                'temp' => $data['main']['temp'],
                'city' => $data['name'],
                'country' => $data['sys']['country'],
                'description' => ucfirst($data['weather'][0]['description']),
                'humidity' => $data['main']['humidity'],
                'wind' => $data['wind']['speed'],
                'pressure' => $data['main']['pressure']
            ];
        } else {
            $error = "City not found!";
        }
    } else {
        $error = "Unable to connect to the API.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Live Weather App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('https://images.pexels.com/photos/1183099/pexels-photo-1183099.jpeg'); /* Weather bg */
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .weather-card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      padding: 30px;
      max-width: 400px;
      width: 100%;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
      text-align: center;
      opacity: 0.8;
      
    }

    .weather-icon {
      width: 100px;
    }

    .temperature {
      font-size: 48px;
      font-weight: bold;
    }

    .description {
      font-size: 20px;
      color: #555;
      text-transform: capitalize;
    }

    .search-form {
      max-width: 400px;
      width: 100%;
      margin-bottom: 30px;
    }
    .heading{
        color: white;
        margin-bottom: 25px;
        font-size: 48px;
    }
    
  </style>
</head>
<body>
    <h1 class="heading"><b>Good weather and Good vibes </b></h1>

  <form class="search-form d-flex gap-2" method="get">
    <input type="text" name="city" class="form-control" placeholder="Enter city name..." required>
    <button class="btn btn-primary" type="submit">Search</button>
  </form>

  <?php if ($weather): ?>
    <div class="weather-card">
      <img src="https://openweathermap.org/img/wn/<?= $weather['icon'] ?>@2x.png" alt="Weather Icon" class="weather-icon">
      <div class="temperature"><?= round($weather['temp']) ?>°C</div>
      <div class="location"><?= $weather['city'] ?>, <?= $weather['country'] ?></div>
      <div class="description"><?= $weather['description'] ?></div>
      <hr>
      <div class="row">
        <div class="col-4"><strong>Humidity</strong><br><?= $weather['humidity'] ?>%</div>
        <div class="col-4"><strong>Wind</strong><br><?= $weather['wind'] ?> km/h</div>
        <div class="col-4"><strong>Pressure</strong><br><?= $weather['pressure'] ?> hPa</div>
      </div>
    </div>
  <?php elseif ($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

</body>
</html>
