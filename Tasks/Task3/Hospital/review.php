<?php
session_start();
define('bad', 0);
define('good', 3);
define('very', 5);
define('excellant', 10);
if ($_POST) {
  $_SESSION['review'] = $_POST;
  header('location: result.php');
}

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
          <!-- <form action="result.php" method="post"> -->
          <form method="post">
            <table class="table">
              <thead>
                <tr>
                  <th>Qustions</th>
                  <th>Bad</th>
                  <th>Good</th>
                  <th>Very Good</th>
                  <th>Excellant</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe cleanliness ? </td>
                  <td><input type="radio" id="bad" name="r1" value="<?= bad ?>"></td>
                  <td><input type="radio" id="good" name="r1" value="<?= good ?>"></td>
                  <td><input type="radio" id="very" name="r1" value="<?= very ?>"></td>
                  <td><input type="radio" id="excellant" name="r1" value="<?= excellant ?>"></td>
                </tr>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe Prices ? </td>
                  <td><input type="radio" id="bad" name="r2" value="<?= bad ?>"></td>
                  <td><input type="radio" id="good" name="r2" value="<?= good ?>"></td>
                  <td><input type="radio" id="very" name="r2" value="<?= very ?>"></td>
                  <td><input type="radio" id="excellant" name="r3" value="<?= excellant ?>"></td>
                </tr>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe Services ? </td>
                  <td><input type="radio" id="bad" name="r3" value="<?= bad ?>"></td>
                  <td><input type="radio" id="good" name="r3" value="<?= good ?>"></td>
                  <td><input type="radio" id="very" name="r3" value="<?= very ?>"></td>
                  <td><input type="radio" id="excellant" name="r3" value="<?= excellant ?>"></td>
                </tr>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe Doctors ? </td>
                  <td><input type="radio" id="bad" name="r4" value="<?= bad ?>"></td>
                  <td><input type="radio" id="good" name="r4" value="<?= good ?>"></td>
                  <td><input type="radio" id="very" name="r4" value="<?= very ?>"></td>
                  <td><input type="radio" id="excellant" name="r4" value="<?= excellant ?>"></td>
                </tr>
                <tr>
                  <td scope="row">Are you satisflied with the level of ehe Hospital ? </td>
                  <td><input type="radio" id="bad" name="r5" value="<?= bad ?>"></td>
                  <td><input type="radio" id="good" name="r5" value="<?= good ?>"></td>
                  <td><input type="radio" id="very" name="r5" value="<?= very ?>"></td>
                  <td><input type="radio" id="excellant" name="r5" value="<?= excellant ?>"></td>
                </tr>
              </tbody>
            </table>
            <div class="form-group">
              <button type="submit" name="" id="" class="form-control btn-primary" placeholder=""
                aria-describedby="helpId">Result</button>
            </div>
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