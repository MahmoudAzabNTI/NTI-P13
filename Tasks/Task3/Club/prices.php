<?php
session_start();
$footballs = $_SESSION['football'];
$swimmings = $_SESSION['swimming'];
$volleyballs = $_SESSION['volleyball'];
$otherss = $_SESSION['others'];
$members = $_SESSION['members'];
$count =  $_SESSION['count'];
$totlaSucscribe = 10000 + (2500 * $count);
$sumFootballs = 0;
$sumSwimmings = 0;
$sumVolleyballs = 0;
$sumOtherss = 0;
// print_r($members);

foreach ($footballs as $key => $value) {
  # code...
  global $sumFootballs;
  $sumFootballs += $value;
}
foreach ($swimmings as $key => $value) {
  # code...
  global $sumSwimmings;
  $sumSwimmings += $value;
}
foreach ($volleyballs as $key => $value) {
  # code...
  global $sumVolleyballs;
  $sumVolleyballs += $value;
}
foreach ($otherss as $key => $value) {
  # code...
  global $sumOtherss;
  $sumOtherss += $value;
}
$totalPrice = $totlaSucscribe + $sumFootballs + $sumSwimmings + $sumVolleyballs + $sumOtherss;

// print_r($sumFootballs);
// die;

$table = "<table class='table'>
    <thead>
      <tr>
        <th>Subscriper</th>
        <th></th>
        <th>Gamaing</th>
        <th></th>
        <th></th>
        <th>Total Subscribe</th>
      </tr>
    </thead>
    <tbody>";
foreach ($members as $key => $value) {
  # code...
  $table .= "<tr>
        <td scope='row'>$value</td>
        <td>Football</td>
        <td>Swimmuing</td>
        <td>Volleball</td>
        <td>Ohers</td>
        <td>800 LE</td>
      </tr>";
}

$table .= "
      <tr class='alert alert-primary'>
        <td>TotlaPrice</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>1600 LE</td>
      </tr>
      <tr>
        <td>Football Club</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>$sumFootballs</td>
      </tr>
      <tr>
        <td>Swimming Club</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>$sumSwimmings</td>
      </tr>
      <tr>
        <td>Volleyball</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>$sumVolleyballs</td>
      </tr>
      <tr>
        <td>Others Activites</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>$sumOtherss</td>
      </tr>
      <tr class='alert alert-primary'>
        <td>Club Subscription</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>1600 LE</td>
      </tr>
      <tr class='alert alert-primary'>
      <td>Total Price</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>$totalPrice</td>
    </tr>
    </tbody>
  </table>";
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="offset-1 col-12">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center">Prices</h2>
          </div>
          <div class="col-12"> <?= isset($table)  ? $table : ''; ?> </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>