<!DOCTYPE html>
<html lang="en">
<?php

   $titulo = 'Salt & Pepper';
   $styles = [
      'master.css',
      'header.css',
      'index.css',
   ];

   require 'head.php';

?>
<body>
   <div class="container">
      <?php require 'header.php'; ?>

      <section id="banner">
      </section>

      <?php require 'fichas.php'; ?>
   </div>
</body>
</html>