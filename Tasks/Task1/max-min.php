<?php
if ($_POST) {
  $max;
  $min;
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $num3 = $_POST['num3'];
  if ($num1 >= $num2 && $num1 >= $num3) {
    $max = $num1;
  } else if ($num2 >= $num1 && $num2 >= $num3) {
    $max = $num2;
  } else {
    $max = $num3;
  }
  $max = "<div class='alert alert-success'>the Max value is $max</div>";
  if ($num1 <= $num2 && $num1 <= $num3) {
    $min = $num1;
  } else if ($num2 <= $num1 && $num2 <= $num3) {
    $min = $num2;
  } else {
    $min = $num3;
  }
  $min = "<div class='alert alert-success'>the Max value is $min</div>";
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
    <div class="row">
      <div class="offset-3 col-7">
        <div class="row mt-5">
          <div class="col-12 text-center">
            <h2 class="h2 text-warning">Calculate the Max and Min</h2>
          </div>
          <div class="col-12">
            <form action="" method="post">
              <div class="form-group">
                <label for="num1">Number 1</label>
                <input type="number" name="num1" id="num1" class="form-control" placeholder="Enter Number 1"
                  aria-describedby="helpId" value="<?= (isset($_POST['num1'])) ? $num1 : ''; ?>">
              </div>
              <div class="form-group">
                <label for="num1">Number 2</label>
                <input type="number" name="num2" id="num2" class="form-control" placeholder="Enter Number 1"
                  aria-describedby="helpId" value="<?= (isset($_POST['num2'])) ? $num2 : ''; ?>">
              </div>
              <div class="form-group">
                <label for="num1">Number 3</label>
                <input type="number" name="num3" id="num3" class="form-control" placeholder="Enter Number 1"
                  aria-describedby="helpId" value="<?= (isset($_POST['num3'])) ? $num3 : ''; ?>">
              </div>
              <div class="form-group">
                <button class="btn btn-primary">Calculate</button>
              </div>
            </form> <?= (isset($max)) ? $max : ''; ?> <?= (isset($min)) ? $min : ''; ?>
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