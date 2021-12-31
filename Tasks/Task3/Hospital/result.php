<?php
session_start();
$phone = $_SESSION['phone'];
$review = $_SESSION['review'];
$bad = "Bad";
$good = "Good";
$very = "Very Good";
$excellant = "Excellant";
$r1;
$sum = 0;

if ($sum <= 25) {
  $result = $bad;
} else {
  $result = $good;
}
function review($rev)
{
  if ($rev < 3) {
    global $bad;
    $r1 = $bad;
  } else if ($rev >= 3 && $rev < 5) {
    global $good;
    $r1 = $good;
  } else if ($rev >= 5 && $rev < 10) {
    global $very;
    $r1 = $very;
  } else {
    global $excellant;
    $r1 = $excellant;
  }
  return $r1;
}
for ($i = 1; $i <= 5; $i++) {
  # code...
  $sum += $review['r' . $i];
}
$message1 = " <p class='alert alert-danger'>Please contact the patient to find out the reason for the Result evaluationfor {$phone} </p>";
$message2 = " <p class='alert alert-success'>Thank you</p>";
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
      <div class=" col-12">
        <div class="text-center">
          <h2>Hospital Survey</h2>
        </div>
        <div class="col-12">
          <form action="review.php" method="post">
            <table class="table">
              <thead>
                <tr>
                  <th>Qustions</th>
                  <th>Review</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe cleanliness ? </td>
                  <td><label for="result"><?= review($review['r1']) ?></label></td>
                </tr>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe Prices ? </td>
                  <td><label for="result"><?= review($review['r2']) ?></label></td>
                </tr>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe Services ? </td>
                  <td><label for="result"><?= review($review['r3']) ?></label></td>
                </tr>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe Doctors ? </td>
                  <td><label for="result"><?= review($review['r4']) ?></label></td>
                </tr>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe Hospital ? </td>
                  <td><label for="result"><?= review($review['r5']) ?></label></td>
                </tr>
                <tr class="alert alert-primary">
                  <td scope="row">Total Review</td>
                  <td><label for="result"><?= $sum < 25 ? 'Bad' : 'Good' ?></label></td>
                </tr>
              </tbody>
            </table>
            <div class="form-group"> <?= $sum < 25 ? $message1 : $message2 ?> </div>
          </form>
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