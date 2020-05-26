<?php require 'lang/lang.php'?>

<?php require 'partials/header.php'?>

   <div class="container">
      <section class="text">
         <h2 class="title">
            <?=lang('transc.title.1')?>
         </h2>
         <p>
            <?=lang('transc.parag.1')?>
         </p>

         <h2 class="title">
            <?=lang('transc.title.2')?>
         </h2>
         <ul>
            <?php foreach (lang('transc.parag.2') as $item) : ?>
            <li>
               <?= $item ?>
            </li>
            <?php endforeach ?>
         </ul>

         <?php foreach(lang('transc.groups') as $group) : ?>
         <article class="links-group">
            <h3>
               <?=$group['name']?>
            </h3>
            <ul>
               <?php foreach($group['files'] as $file) : ?>
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
               </li>
               <?php endforeach ?>
            </ul>
         </article>
         <?php endforeach ?>
      </section>
   </div>

   <script src="https://kit.fontawesome.com/487b4db8ef.js" crossorigin="anonymous"></script>
   <script src="js/main.js"></script>
   <script src="js/dropdown.js"></script>
</body>
</html>
