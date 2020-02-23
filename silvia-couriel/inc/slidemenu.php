    <div class="slide-menu">
      <div class="title-wrapper">
        <div>SilviaCouriel</div>
        <i class="far fa-times-circle"></i>
      </div>

      <div class="separator">
      </div>

      <ul>
        <li>
          <?php if ($section == 'sculpt') :?>
            <?= lang($titles['sculpt']) ?>
          <?php else : ?>
            <a href="?menu=sculpt" onclick="saveAudioTime()">
              <?= lang($titles['sculpt']) ?>
            </a>
          <?php endif ?>
        </li>
        <li>
          <?php if ($section == 'small') :?>
            <?= lang($titles['small']) ?>
          <?php else : ?>
            <a href="?menu=small" onclick="saveAudioTime()">
              <?= lang($titles['small']) ?>
            </a>
          <?php endif ?>
        </li>
        <li>
          <?php if ($section == 'drawings') :?>
            <?= lang($titles['drawings']) ?>
          <?php else : ?>
            <a href="?menu=drawings" onclick="saveAudioTime()">
              <?= lang($titles['drawings']) ?>
            </a>
          <?php endif ?>
        </li>
      </ul>

      <div class="separator">
      </div>
      
      <ul>
        <li>
          <?php if ($section == 'curric') :?>
            <?= lang($titles['curric']) ?>
          <?php else : ?>
            <a href="?menu=curric" onclick="saveAudioTime()">
              <?= lang($titles['curric']) ?>
            </a>
          <?php endif ?>
        </li>
        <!-- <li>
          /*
          <?php if ($section == 'exhib') :?>
            <?= lang($titles['exhib']) ?>
          <?php else : ?>
            <a href="?menu=exhib">
              <?= lang($titles['exhib']) ?>
            </a>
          <?php endif ?>
          */
        </li> -->
        <li>
          <?php if ($section == 'contact') :?>
            <?= lang($titles['contact']) ?>
          <?php else : ?>
            <a href="?menu=contact" onclick="saveAudioTime()">
              <?= lang($titles['contact']) ?>
            </a>
          <?php endif ?>
        </li>
      </ul>

      <div class="separator">
      </div>
      
      <ul>
        <li>
          <a href="inc/resetlang.php" onclick="resetAudio()">
            <?= lang($titles['home']) ?>
          </a>
        </li>
      </ul>

      <p>&nbsp;</p>
      <p class="visits-text">
        <?= lang($titles['visits']) ?>:
        <?= $visits ?>
      </p>

    </div>
  
