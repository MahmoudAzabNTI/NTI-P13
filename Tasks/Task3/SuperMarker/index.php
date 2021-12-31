<?php


if (isset($_POST['enter'])) {
  $productsTable = drwaTable();
}
if (isset($_POST['receipt'])) {
  $invoiceTable = drawInvoiceTable();
}
function drwaTable()
{
  $table = "<table class='table table-bordered text-center'>
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Price</th>
      <th>Qty</th>
      <th>Actions</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>";
  for ($i = 1; $i <= $_POST['num']; $i++) {
    # code...
    $table .= "
    <tr>
      <td scope='row'>
      <input type='text' name='productName[]'>
      </td>
      <td>
      <input type='text' name='price[]'></td>
      <td>
      <input type='text' name='qty[]'></td>
      <td><button type='button' name='add' class='btn btn-success btn-sm'>Add</button></td>
      <td><button type='button' name='remove' class='btn btn-danger btn-sm'>Remove</button></td>
    </tr>";
  }

  $table .= "
  </tbody>
  </table>";
  $table .= "
  <button type='submit' name='receipt'  class='form-control btn-primary'>Receipt</button>";
  return $table;
}
function calculateDelivery($city)
{
  switch ($city) {
    case 'cairo':
      # code...
      return 0;
      break;
    case 'giza':
      # code...
      return 30;
      break;
    case 'alex':
      # code...
      return 50;
      break;
    default:
      # code...
      return  100;
      break;
  }
}
function calculateDiscountPercentage($total)
{
  if ($total < 1000) {
    return 0;
  } else if ($total > 1000 && $total < 3000) {

    return .10;
  } else if ($total > 3000 && $total < 4500) {

    return .15;
  } else {
    return .20;
  }
}

function drawInvoiceTable()
{
  $products = [];
  $productName =  $_POST['productName'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];
  $total = 0;
  foreach ($productName as $key => $value) {
    $products[$key]->name = $productName[$key];
    $products[$key]->price = $price[$key];
    $products[$key]->qty = $qty[$key];
    $products[$key]->subTotal = $price[$key] * $qty[$key];
    $total += $products[$key]->subTotal;
  }
  $percentage = calculateDiscountPercentage($total);
  $discount = $percentage * $total;
  $priceAfterDiscount = $total - $discount;
  $delivery = calculateDelivery($_POST['city']);
  $totalAfterDelivery = $priceAfterDiscount + $delivery;



  $table2 = "<table class='table table-bordered text-center'>
    <thead>
      <tr>
        <th>ProdcutName</th>
        <th>Price</th>
        <th>Qty</th>
        <th>SubTotal</th>
      </tr>
    </thead>
    <tbody>";
  foreach ($products as $index => $product) {
    # code...
    $table2 .= "<tr>";
    foreach ($product as $property => $value) {
      # code...
      $table2 .= "
      <td scope='row'>$value</td>";
    }
    $table2 .= "</tr>";
  }

  $table2 .= "<tr class='alert alert-danger'>
        <td scope='row'>ClintName</td>
        <td></td>
        <td>{$_POST['username']}</td>
        <td></td>
      </tr>
    <tr>
      <td scope='row'>City</td>
      <td></td>
      <td> {$_POST['city']} </td>
      <td></td>
    </tr>
    <tr>
      <td scope='row'>Total</td>
      <td></td>
      <td>$total</td>
      <td></td>
    </tr>
    <tr>
    <td scope='row'>Discount %</td>
    <td></td>
    <th >" . ($percentage * 100) . " %</th>
  </tr>
    <tr>
      <td scope='row'>Discount Value</td>
      <td></td>
      <td>$discount</td>
      <td></td>
    </tr>
    <tr>
      <td scope='row'>Total After Discount</td>
      <td></td>
      <td>$priceAfterDiscount</td>
      <td></td>
    </tr>
    <tr>
    <td scope='row'>Delivery</td>
    <td></td>
    <td>$delivery</td>
    <td></td>
  </tr>
  <tr>
    <td scope='row' class='text-danger'>Total After Discount</td>
    <td></td>
    <td class='text-danger'>$totalAfterDelivery</td>
    <td></td>
  </tr>";

  $table2 .= "</tbody></table>";
  return $table2;
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
      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center">Super Market</h2>
          </div>
          <div class="col-12">
            <form method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter user name"
                  aria-describedby="helpId" value="<?= (isset($_POST['username'])) ? $username : ''; ?>">
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <select name="city" id="city" class="form-control">
                  <option <?= (isset($_POST['city']) && $_POST['city'] == 'cairo') ? 'selected' : '' ?> value="cairo">
                    Cairo</option>
                  <option <?= (isset($_POST['city']) && $_POST['city'] == 'giza') ? 'selected' : '' ?> value="giza">
                    Giza</option>
                  <option <?= (isset($_POST['city']) && $_POST['city'] == 'alex') ? 'selected' : '' ?> value="alex">
                    Alex</option>
                  <option <?= (isset($_POST['city']) && $_POST['city'] == 'others') ? 'selected' : '' ?> value="others">
                    Others </option>
                </select>
              </div>
              <div class="form-group">
                <label for="username">Number of vareties</label>
                <input type="number" name="num" id="num" class="form-control" placeholder="Enter num of years"
                  aria-describedby="helpId" value="<?= (isset($_POST['num'])) ? $num : ''; ?>">
              </div>
              <div class="form-group">
                <button type="submit" name="enter" id="name" class="form-control btn-primary" placeholder=""
                  aria-describedby="helpId">Enter Products</button>
              </div>
              <div class="row"> <?= isset($productsTable) ?  $productsTable : '' ?> </div>
              <div class="row"> <?= isset($invoiceTable) ?  $invoiceTable : '' ?> </div>
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