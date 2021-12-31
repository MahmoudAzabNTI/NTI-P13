<?php
if ($_POST) {
  $count = $_POST['count'];
  $surcharge = 0.2;
  $result;
  if ($count <= 0) {
    $result = 0;
  } else if ($count > 0 && $count <= 50) {
    $result = $count * .50;
  } else if ($count  > 50 && $count <= 150) {
    $result = $count * .75;
  } else if ($count   > 150 && $count <= 250) {
    $result = $count * 1.20;
  } else {
    $result = $count * 1.50;
  }
  $surchargeValue = $result * 0.2;
  $total = $result + $surchargeValue;
  $message = "<div class='alert alert-success'>Total Electricity Value is $total</div>";
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
          <div class="col-12 text-center">
            <h2 class="text-warning">Calcuate Electricity </h2>
          </div>
          <div class="col-12">
            <form action="" method="post">
              <div class="form-group">
                <label for="count">Enter your count of keilos</label>
                <input type="text" name="count" id="count" class="form-control" placeholder="" aria-describedby="helpId"
                  value="<?= (isset($_POST['count'])) ? $count : ''; ?>">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Calculate</button>
              </div>
            </form> <?= (isset($message)) ? $message : ''; ?>
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