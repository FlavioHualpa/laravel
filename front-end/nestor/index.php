<?php $page = 'index' ?>

<?php require 'lang/lang.php' ?>

<?php require 'partials/header.php' ?>

   <div class="container">
      <div class="announcement">
         <span class="featured">
            <img src="img\josquindesprez.png" alt="Josquin des Prez" class="image">
            <p class="mb-0"><?= lang('curric.announcement.1') ?></p>
            <p class="mb-0"><?= lang('curric.announcement.2') ?></p>
         </span>
      </div>
      <img src="img\retrato2018.png" alt="Néstor Zadoff" class="portrait">
      <section class="text">
         <h2 class="title desktop-only">
            Néstor Zadoff
         </h2>
         <p>
            <?= lang('curric.text.1') ?>
         </p>
         <p>
            <?= lang('curric.text.2') ?>
         </p>
         <p>
            <?= lang('curric.text.3') ?>
         </p>
         <p>
            <?= lang('curric.text.4') ?>
         </p>
         <p>
            <?= lang('curric.text.5') ?>
         </p>
         <p>
            <?= lang('curric.text.6') ?>
         </p>
      </section>
   </div>

<?php require 'partials/footer.php' ?>
