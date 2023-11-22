<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
<?php 

$hotels = [

  [
      'name' => 'Hotel Belvedere',
      'description' => 'Hotel Belvedere Descrizione',
      'parking' => true,
      'vote' => 4,
      'distance_to_center' => 10.4
  ],
  [
      'name' => 'Hotel Futuro',
      'description' => 'Hotel Futuro Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 2
  ],
  [
      'name' => 'Hotel Rivamare',
      'description' => 'Hotel Rivamare Descrizione',
      'parking' => false,
      'vote' => 1,
      'distance_to_center' => 1
  ],
  [
      'name' => 'Hotel Bellavista',
      'description' => 'Hotel Bellavista Descrizione',
      'parking' => false,
      'vote' => 5,
      'distance_to_center' => 5.5
  ],
  [
      'name' => 'Hotel Milano',
      'description' => 'Hotel Milano Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 50
  ],

];

$is_park_filter_checked = $_GET['park_filter'] ==! null ? true : false;

?>
<section class="table-section">
<table class="table table-striped table-hover align-middle" >
  <thead> 
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Parking</th>
      <th scope="col">Vote</th>
      <th scope="col">Distance To Center</th>
    </tr>
  </thead>
  <tbody class="align-middle">
    <?php 

    $filtered_hotels = $hotels;

    if ($is_park_filter_checked) {
      $filtered_hotels = array_filter($hotels, fn ($hotel) => $hotel["parking"]);
    }
    foreach($filtered_hotels as $hotel) { 
        echo "<tr>";
        foreach ($hotel as $hotel_info) 
        {
          echo "<td>".$hotel_info."</td>";
        }
        echo "</tr>";
    }
?> 
  </tbody>
</table>
<form id="form" method="get" action="">
  <div class="form-check">
    <label class="form-check-label" for="gridCheck">
      Clicca per filtrare hotel solo con parcheggi 
    </label>
    <input class="form-check-input" name="park_filter" type="checkbox" id="gridCheck">
  </div>
  <button type="submit" class="btn btn-primary mt-1">Aggiorna</button>
  <button type="reset" id="resetBtn" class="btn btn-danger mt-1">Clicca per resettare</button>
</form>
</section>
<script async>
  const form = document.getElementById('form');
  const resetButton = document.getElementById('resetBtn')

  resetButton.addEventListener("click", reset)

  function reset () {
    form.submit();
  }

</script>

</body>
</html>