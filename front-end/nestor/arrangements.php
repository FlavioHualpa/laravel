<?php $page = 'arrangements' ?>

<?php
$type = $_GET['type'] ?? null;

if ($type != 'free' && $type != 'published')
{
   header('location: error/404.php');
   exit;
}
?>

<?php require 'lang/lang.php' ?>

<?php require 'partials/header.php' ?>

<?php $today = new DateTime() ?>

   <div class="container">
   <?php
      switch ($type)
      {
         case 'free':
            require 'partials/arrangements/free.php';
         break;

         case 'published':
            require 'partials/arrangements/published.php';
         break;
      }
   ?>
   </div>

<?php require 'partials/footer-download.php' ?>
