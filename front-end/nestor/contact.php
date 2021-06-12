<?php $page = 'contact' ?>

<?php require 'src/ipblock.php' ?>

<?php require 'lang/lang.php' ?>

<?php require 'src/validate.php' ?>

<?php require 'partials/header.php' ?>

   <div class="container">

      <section class="text">

         <div class="contact-form">

            <h2 class="title">
               <?= lang('contact.title.1') ?>
            </h2>

            <br>
            <br>

            <form action="contact.php" method="post">

               <div>
                  <label for="name">
                     <?= lang('contact.label.1') ?>
                  </label>
                  <input
                     type="text"
                     name="name"
                     id="name"
                     value="<?= old('name') ?>"
                     autofocus
                  >
                  <?= error('name') ?>
               </div>

               <div>
                  <label for="email">
                     <?= lang('contact.label.2') ?>
                  </label>
                  <input
                     type="text"
                     name="email"
                     id="email"
                     value="<?= old('email') ?>"
                  >
                  <?= error('email') ?>
               </div>

               <div>
                  <label for="query">
                     <?= lang('contact.label.3') ?>
                  </label>
                  <textarea
                     type="text"
                     name="query"
                     id="query"
                     rows="6"
                  ><?= old('query') ?></textarea>
                  <?= error('query') ?>
               </div>

               <button type="submit">
                  <?= lang('contact.label.4') ?>
               </button>

            </form>
         
         </div>
      
      </section>

   </div>

<?php require 'partials/footer.php' ?>
