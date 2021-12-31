<?php
session_start();
$name = $_SESSION['name'];
$count = $_SESSION['count'] + 1;
for ($i = 1; $i <= $count; $i++) {
  # code....
  $member .= "<div class='form-group'>
  <label for='member$i'>Member$i</label>";
  if ($i == 1) {
    $member .= "<input type='text' name='member$i' id='member$i' class='form-control' placeholder='' aria-describedby='helpId' value='$name'>";
  } else {
    $member .= "<input type='text' name='member$i' id='member$i' class='form-control' placeholder='' aria-describedby='helpId' value=''>";
  }

  $member .= "<input type='checkbox' name='football[]' id='' value='300'>
  <label for=''>FootBall(300 L.E)</label><br>
  <input type='checkbox' name='swimming[]' id='' value='250'>
  <label for=''>Swimming(250 L.E)</label><br>
  <input type='checkbox' name='volleyball[]' id='' value='150'>
  <label for=''>Volleyball(150 L.E)</label><br>
  <input type='checkbox' name='others[]' id='' value='100'>
  <label for=''>Others(100 L.E)</label><br>
</div>";
}
if ($_POST) {
  $_SESSION['football'] = $_POST['football'];
  $_SESSION['swimming'] = $_POST['swimming'];
  $_SESSION['volleyball'] = $_POST['volleyball'];
  $_SESSION['others'] = $_POST['others'];
  $members = [];
  for ($i = 1; $i <= $count; $i++) {
    # code...
    global $members;
    array_push($members, $_POST['member' . $i]);
  }
  $_SESSION['members'] = $members;
  header('location: prices.php');
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
            <h2 class="text-center">Ahly Club</h2>
          </div>
          <div class="col-12">
            <form action="" method="post"> <?= isset($member) ? $member : '' ?>
          </div>
          <div class="form-group">
            <label for=""></label>
            <button type="submit" name="" id="" class="form-control btn-primary" placeholder=""
              aria-describedby="helpId">Check Price</button>
          </div>
          </form>
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