<footer class="footer">

   <div>
      <img src="img/retrato2018.png" alt="Néstor Zadoff">
      <h4>
         Néstor
         <br>
         Zadoff
      </h4>
      <p>
         <a href="mailto:info@nestorzadoff.com.ar">
            info@nestorzadoff.com.ar
         </a>
      </p>
   </div>

   <div>
      <ul>
         <li>
            <a href="index.php">
               <?= lang('menu.opt.news') ?>
            </a>
         </li>
         <li>
            <a href="curriculum.php">
               <?= lang('menu.opt.curric') ?>
            </a>
         </li>
         <li>
            <a href="transcriptions.php">
               <?= lang('menu.opt.trans') ?>
            </a>
         </li>
         <li>
            <a href="articles.php">
               <?= lang('menu.opt.art') ?>
            </a>
         </li>
         <li>
            <a href="arrangements.php?type=free">
               <?= lang('menu.opt.free') ?>
            </a>
         </li>
         <li>
            <a href="arrangements.php?type=published">
               <?= lang('menu.opt.published') ?>
            </a>
         </li>
         <li>
            <a href="performances.php">
               <?= lang('menu.opt.perf') ?>
            </a>
         </li>
         <li>
            <a href="contact.php">
               <?= lang('menu.opt.contact') ?>
            </a>
         </li>
      </ul>
   </div>

   <div>
      <p>
         <?= lang('visits') ?>
         <?= $visits ?>
      </p>
      <p>
         <small><?= lang('webmaster') ?></small>
      </p>
   </div>

</footer>
