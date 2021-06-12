<?php $page = 'news' ?>

<?php require 'lang/lang.php' ?>

<?php require 'partials/header.php' ?>

   <div class="container">
      <div class="announcement">
         <h2>
            <?= lang('news.title.1') ?>
         </h2>
         <br>
         <p>
            <?= lang('news.paragraph.1') ?>
         </p>
         <p>
            <?= lang('news.paragraph.2') ?>
         </p>
         <p>
            <?= lang('news.paragraph.3') ?>
         </p>
         <p>
            <?= lang('news.paragraph.4') ?>
         </p>
         <br>
         <h3>
            <?= lang('news.subtitle.1') ?>
            <?= date('Y') ?>
         </h3>

         <span class="featured">
            <img src="img\josquindesprez.png" alt="Josquin des Prez" class="image">
            <p class="mb-0"><?= lang('news.announcement.1') ?></p>
            <p class="mb-0"><?= lang('news.announcement.2') ?></p>
         </span>

         <span class="featured">
            <p class="mb-0"><?= lang('news.announcement.3') ?></p>
         </span>
      </div>

<?php require 'partials/footer.php' ?>
