      <section class="text">

         <h2 class="title">
            <?=lang('free.title.1')?>
         </h2>

         <br>

         <?php foreach (lang('free.paragraphs') as $parag) : ?>
         <p>
            <?= $parag ?>
         </p>
         <?php endforeach ?>

         <article class="awarded-group">
            <ul>
               <?php foreach (lang('free.awarded') as $item) : ?>
               <li>
                  <?=$item?>
               </li>
               <?php endforeach?>
            </ul>
         </article>

         <?php foreach (lang('free.groups') as $group) : ?>
         <article class="links-group">
            <h3>
               <?=$group['name']?>
            </h3>

            <?php if ($group['reference']): ?>
            <span class="group-ref">
               <?=$group['reference']?>
            </span>
            <?php endif?>

            <ul>
               <?php foreach ($group['files'] as $file) : ?>
               <li>
                  <img src="img/acrobat_icon.png" class="pdf-icon">

                  <a href="<?=$file['link']?>"
                     <?=$file['pdf_id'] ?
                     'data-link="./src/displaypdf.php?id='
                     . $file['pdf_id'] . '"'
                     : ''
                     ?>
                  >
                     <?=$file['name']?>
                  </a>

                  <?php if ($file['info']) {
                     echo " " . $file['info'];
                  }
                  ?>

                  <?php
                  $days = date_diff(
                     new DateTime($file['added_at']),
                     $today)
                     ->days;
                  ?>

                  <?php if ($days <= 30) : ?>
                  <span class="badge">
                     <?=lang('new')?>
                  </span>
                  <?php endif ?>

                  <?php if ($file['awarded']) : ?>
                  <img src="img/award-icon.png" class="award-icon">
                  <?php endif ?>
               
               </li>
               <?php endforeach ?>
            </ul>
         </article>
         <?php endforeach ?>

      </section>
