            <ul>
               <li class="<?= $page == 'news' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="index.php">
                     <?= lang('menu.opt.news') ?>
                  </a>
               </li>
               <li class="<?= $page == 'curric' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="curriculum.php">
                     <?= lang('menu.opt.curric') ?>
                  </a>
               </li>
               <li class="<?= $page == 'transcriptions' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="transcriptions.php" class="new">
                     <?= lang('menu.opt.trans') ?>
                  </a>
                  <div class="new-tooltip">
                     <?= lang('menu.tooltip.new') ?>
                  </div>
               </li>
               <li class="<?= $page == 'articles' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="articles.php" class="new">
                     <?= lang('menu.opt.art') ?>
                  </a>
                  <div class="new-tooltip">
                     <?= lang('menu.tooltip.new') ?>
                  </div>
               </li>
               <li class="<?= $page == 'arrangements' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="#" class="new">
                     <?= lang('menu.opt.arr') ?>
                  </a>
                  <div class="new-tooltip">
                     <?= lang('menu.tooltip.new') ?>
                  </div>
                  <ul class="submenu">
                     <li>
                        <a href="arrangements.php?type=free" class="new">
                           <?= lang('menu.opt.free') ?>
                        </a>
                     </li>
                     <li>
                        <a href="arrangements.php?type=published">
                           <?= lang('menu.opt.published') ?>
                        </a>
                     </li>
                  </ul>
               </li>
               <li class="<?= $page == 'performances' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="performances.php">
                     <?= lang('menu.opt.perf') ?>
                  </a>
               </li>
               <li class="<?= $page == 'contact' ? 'selected' : '' ?>">
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="contact.php">
                     <?= lang('menu.opt.contact') ?>
                  </a>
               </li>
               <li>
                  <i class="fas fa-angle-double-right drop-down-only"></i>
                  <a href="#"><?= lang('menu.opt.lang') ?></a>
                  <ul class="submenu">
                     <li>
                        <div>
                           <a href="lang/setlang.php?lang=es">
                              <img
                                 src="img/band_esp.png"
                                 alt="<?= lang('menu.opt.esp') ?>"
                              >
                              <?= lang('menu.opt.esp') ?>
                           </a>
                        </div>
                     </li>
                     <li>
                        <div>
                           <a href="lang/setlang.php?lang=en">
                              <img
                                 src="img/band_ing.png"
                                 alt="<?= lang('menu.opt.eng') ?>"
                              >
                              <?= lang('menu.opt.eng') ?>
                           </a>
                        </div>
                     </li>
                     <li>
                        <div>
                           <a href="lang/setlang.php?lang=fr">
                              <img
                                 src="img/band_fra.png"
                                 alt="<?= lang('menu.opt.fra') ?>"
                              >
                              <?= lang('menu.opt.fra') ?>
                           </a>
                        </div>
                     </li>
                  </ul>
               </li>
            </ul>
