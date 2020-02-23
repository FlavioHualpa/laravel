<?php

include 'data.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Carrito de compras</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="container">
    <h1 class="mt-5 mb-5">Carrito de compras</h1>

    <form action="update.php" method="post">

      <?php foreach($items as $item) : ?>

        <div class="form-row">

          <div class="form-group col-md-4">
            <p class="title mt-2 mb-0">
              <?= $item['title'] ?>
            </p>
          </div>

          <div class="form-group col-md-3">
            <p class="mt-2 mb-0">
              <?= $item['author'] ?>
            </p>
          </div>

          <div class="form-group col-md-2">
            <p class="text-right mt-2 mb-0 mr-3" id="price-<?= $item['book_id'] ?>">
              <?= '$ ' . number_format($item['unit_price'], 2, ',', '.') ?>
            </p>
          </div>

          <div class="form-group col-md-1">
            <input type="text" class="form-control text-right" id="quantity-<?= $item['book_id'] ?>" name="cart[<?= $index ?>][quantity]" value="<?= $item['quantity'] ?>">
          </div>

          <div class="form-group col-md-2">
            <p class="subtotal text-right mt-2 mb-0" id="subtotal-<?= $item['book_id'] ?>">
              <?= '$ ' . number_format($item['unit_price'] * $item['quantity'], 2, ',', '.') ?>
            </p>
          </div>

          <input type="hidden" name="cart[<?= $index ?>][book_id]" value="<?= $item['book_id'] ?>">

          <input type="hidden" name="cart[<?= $index ?>][unit_price]" value="<?= $item['unit_price'] ?>">

        </div>

      <?php $index++ ?>
      <?php endforeach ?>

      <div class="form-group">
        <button type="submit" class="btn btn-primary mt-4">
          Actualizar Carrito
        </button>
      </div>
    </form>

  </div>

  <script src="js/script.js"></script>
</body>
</html>