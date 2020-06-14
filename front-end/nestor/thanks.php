<?php

session_start();
$name = null;

if (isset($_SESSION['contact_name']))
{
   $name = $_SESSION['contact_name'];
   unset($_SESSION['contact_name']);
}

?>

<?php require 'lang/lang.php' ?>

<?php require 'partials/header.php' ?>

   <div class="container">

      <section class="text">

         <div class="contact-form">

            <h2 class="title">
               <?= lang('contact.thanks.1') . $name ?>
            </h2>
            <h3 class="title">
               <?= lang('contact.thanks.2') ?>
            </h3>

            <br>
            <br>

            <div class="flex">
               <a href="./contact.php" class="btn">
                  <?= lang('contact.thanks.3') ?>
               </a>
               <a href="./index.php" class="btn">
                  <?= lang('contact.thanks.4') ?>
               </a>
            </div>
         
         </div>
      
      </section>

   </div>

<?php require 'partials/footer.php' ?>
