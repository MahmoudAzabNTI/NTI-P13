<?php
if ($_POST) {
  $name = $_POST['name'];
  $loanAmount = $_POST['loan'];
  $years = $_POST['years'];
  $numMonthly = $years * 12;
  if ($years < 3) {
    $interstValue = ($loanAmount * 10 / 100) * $years;
    $loanAfterInterst = $loanAmount + $interstValue;
    $monthlyValue = $loanAfterInterst / $numMonthly;
  } else {
    $interstValue = ($loanAmount * 15 / 100) * $years;
    $loanAfterInterst = $loanAmount + $interstValue;
    $monthlyValue = $loanAfterInterst / $numMonthly;
  }
  $table = "<table class='table'>
    <thead>
      <tr>
        <th>Interst rate</th>
        <th>Loan After interest</th>
        <th>Monthly</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope='row'>$interstValue</td>
        <td>$loanAfterInterst</td>
        <td>$monthlyValue</td>
      </tr>
    </tbody>
  </table>";
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
      <div class="offset-3 col-6">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center">Bank</h2>
          </div>
          <div class="col-12">
            <form method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter user name"
                  aria-describedby="helpId" value="<?= (isset($_POST['name'])) ? $name : ''; ?>">
              </div>
              <div class="form-group">
                <label for="loan">Loan Amount</label>
                <input type="number" name="loan" id="loan" class="form-control" placeholder="Enter Loan Amount"
                  aria-describedby="helpId" value="<?= (isset($_POST['loan'])) ? $loan : ''; ?>">
              </div>
              <div class="form-group">
                <label for="username">Loan Years</label>
                <input type="number" name="years" id="years" class="form-control" placeholder="Enter num of years"
                  aria-describedby="helpId" value="<?= (isset($_POST['years'])) ? $years : ''; ?>">
              </div>
              <div class="form-group">
                <button type="submit" name="name" id="name" class="form-control" placeholder=""
                  aria-describedby="helpId">Calaculate</button>
              </div>
            </form>
            <div class="row"> <?= isset($table) ?  $table : '' ?> </div>
          </div>
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