<?php
if ($_POST) {
  session_start();
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['count'] = $_POST['count'];
  header('location: subscription.php');
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
            <form action="" method="post">
              <div class="form-group">
                <label for="name">Member Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Club Subscription start with 10.000 L.E</small>
              </div>
              <div class="form-group">
                <label for="count">Count of family members</label>
                <input type="number" name="count" id="count" class="form-control" placeholder=""
                  aria-describedby="helpId">
                <small id="helpId" class="text-muted">Cost of each member is 2.500 L.E</small>
              </div>
              <div class="form-group">
                <label for=""></label>
                <button type="text" name="" id="" class="form-control btn-primary" placeholder=""
                  aria-describedby="helpId">Subscribe</button>
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