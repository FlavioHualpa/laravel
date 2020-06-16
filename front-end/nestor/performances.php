<?php $page = 'performances' ?>

<?php require 'lang/lang.php' ?>

<?php require 'partials/header.php' ?>

   <div class="modal-bg">
   </div>

   <div class="modal-box">
      <img src="" alt="" class="modal-img">
      <i class="far fa-times-circle"></i>
   </div>

   <div class="container">
      <section class="text">

         <h2 class="title">
            <?= lang('perf.title.1') ?>
         </h2>

         <br>

         <div class="perf-group">
            <?php foreach(lang('perf.dates') as $perf) : ?>

               <h3>
                  <?= $perf['month'] ?>
               </h3>

               <?php foreach ($perf['places'] as $place) : ?>
                  <span class="perf-thumb">
                     <img src="<?= $place['imageUrl'] ?>"
                        alt="<?= $place['title'] ?>"
                        title="<?= $place['title'] ?>"
                     >
                  </span>
               <?php endforeach ?>

               <br>
            
            <?php endforeach ?>
         </div>

         <br>

      </section>
   </div>

   <script src="js/modal.js"></script>
<?php require 'partials/footer.php' ?>
