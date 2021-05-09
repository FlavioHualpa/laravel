<?php $page = 'articles' ?>

<?php require 'lang/lang.php' ?>

<?php require 'partials/header.php' ?>

<?php $today = new DateTime()?>

   <div class="container">
      <section class="text">
         <h2 class="title">
            <?=lang('articles.title.1')?>
         </h2>

         <br>

         <div class="links-group">
            <ul>

               <!-- Especial destacado -->
               <li class="featured">
                  <img src="img/acrobat_icon.png" class="pdf-icon">
                  <a href="#" data-link="./src/displaypdf.php?id=124">
                     <?= lang('articles.special.1') ?>
                  </a>
                  <span class="badge">
                     <?=lang('new')?>
                  </span>
               </li>
               <br>
               <p class="featured-footer">
                  <?= lang('articles.special.2') ?>
               </p>
               <!-- Fin especial destacado -->

               <?php foreach(lang('articles.files') as $file) : ?>
               <li>
                  <img src="img/acrobat_icon.png" class="pdf-icon">
                  <a href="<?= $file['link'] ?>"
                     <?= $file['pdf_id'] ?
                     'data-link="./src/displaypdf.php?id='
                     . $file['pdf_id']
                     . '"'
                     : ''
                     ?>
                  >
                     <?= $file['name'] ?>
                  </a>

                  <?php if ($file['info']) echo " " . $file['info']; ?>

                  <?php
                     $days = date_diff(
                        new DateTime($file['added_at']),
                        $today)
                        ->days;
                     if ($days <= 30) :
                  ?>
                  <span class="badge">
                     <?=lang('new')?>
                  </span>
                  <?php endif ?>
               </li>
               <?php endforeach ?>
            </ul>
         </div>

         <br>

         <p><?=lang('articles.title.2')?></p>

         <div class="links-group">
            <ul>
               <?php foreach(lang('articles.references') as $ref) : ?>
               <li>
                  <img src="img/art-ref-icon.png" class="pdf-icon">
                  <?= $ref ?>
               </li>
               <?php endforeach ?>
            </ul>
         </div>

         <br>

      </section>
   </div>

<?php require 'partials/footer-download.php' ?>
