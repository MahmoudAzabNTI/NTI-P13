<?php
if ($_POST) {
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $ope = $_POST['operator'];
  $result;
  switch ($ope) {
    case 'add':
      $result = $num1 + $num2;
      break;
    case 'subtract':
      $result = $num1 - $num2;
      break;
    case 'times':
      $result = $num1 * $num2;
      break;
    case 'divide':
      $result = $num1 / $num2;
      break;
    case 'models':
      $result = $num1 % $num2;
      break;

    default:
      $result = "What is your operator";
      break;
  }
  $message = "<div class='alert alert-success'>the Result  value is $result</div>";
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
            <h2 class="h2 text-warning">Calculator app</h2>
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
                <div class="row">
                  <label for=""></label>
                  <input type="radio" name="operator" id="add" value="add" checked="true">
                  <p class="mr-2">+</p>
                  <input type="radio" name="operator" id="subtract" value="subtract">
                  <p class="mr-2">-</p>
                  <input type="radio" name="operator" id="times" value="times">
                  <p class="mr-2">x</p>
                  <input type="radio" name="operator" id="divide" value="divide">
                  <p class="mr-2">/</p>
                  <input type="radio" name="operator" id="models" value="divide">
                  <p class="mr-2">%</p>
                </div>
              </div>
              <!-- <div class="form-group ">
                <button class="btn btn-primary btn-sm">+</button>
                <button class="btn btn-primary btn-sm">-</button>
                <button class="btn btn-primary btn-sm">X</button>
                <button class="btn btn-primary btn-sm">/</button>
                <button class="btn btn-primary btn-sm">%</button>
              </div> -->
              <div class="form-group">
                <button class="btn btn-primary">Calculate</button>
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