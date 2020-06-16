            <ul>
               <li class="<?= $page == 'index' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="index.php"><?= lang('menu.opt.curric') ?></a>
               </li>
               <li class="<?= $page == 'transcriptions' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="transcriptions.php"><?= lang('menu.opt.trans') ?></a>
               </li>
               <li class="<?= $page == 'articles' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="articles.php"><?= lang('menu.opt.art') ?></a>
               </li>
               <li class="<?= $page == 'arrangements' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="#"><?= lang('menu.opt.arr') ?></a>
                  <ul class="submenu">
                     <li>
                        <a href="arrangements.php?type=free"><?= lang('menu.opt.free') ?></a>
                     </li>
                     <li>
                        <a href="arrangements.php?type=published"><?= lang('menu.opt.published') ?></a>
                     </li>
                  </ul>
               </li>
               <li class="<?= $page == 'performances' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="performances.php"><?= lang('menu.opt.perf') ?></a>
               </li>
               <li class="<?= $page == 'contact' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="contact.php"><?= lang('menu.opt.contact') ?></a>
               </li>
               <li>
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="#"><?= lang('menu.opt.lang') ?></a>
                  <ul class="submenu">
                     <li>
                        <a href="lang/setlang.php?lang=es"><?= lang('menu.opt.esp') ?></a>
                     </li>
                     <li>
                        <a href="lang/setlang.php?lang=en"><?= lang('menu.opt.eng') ?></a>
                     </li>
                     <li>
                        <a href="lang/setlang.php?lang=fr"><?= lang('menu.opt.fra') ?></a>
                     </li>
                  </ul>
               </li>
            </ul>
