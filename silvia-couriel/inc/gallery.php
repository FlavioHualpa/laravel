    <div class="container">

      <!-- Panel derecho (solo en orientación landscape) -->
      <div class="side-box">
        <h2 class="title"><?= lang($title) ?></h2>
        <div id="description">
        </div>
        <div class="works-link">
          <p><?= lang('main.works') ?></p>
          <a href="#works-index">
            <i class="fas fa-chevron-down"></i>
          </a>
        </div>
      </div>

      <!-- Panel izquierdo -->
      <div class="content-box">
        <h2 class="title"><?= lang($title) ?></h2>
        <div class="gallery">
          <div class="gallery-content">
          </div>
          <p><?= lang($gallery[0]['title_key']) ?></p>
          <p><?= lang($gallery[0]['features_key']) ?></p>
        </div>
      </div>

      <!-- Link para el índice de trabajos -->
      <div class="works-link" id="portrait-works-link">
        <a href="#works-index" title="<?= lang('main.works') ?>">
          <i class="fas fa-chevron-down"></i>
        </a>
      </div>

      <!-- Indice de trabajos -->
      <div class="works-index" id="works-index">
        <div>
          <img src="img/esculturas/apto1.png" alt="" class="selected">
        </div>
        <div>
          <img src="img/esculturas/elvuelo.png" alt="" onclick="generateGallery(2)">
        </div>
      </div>
    
    </div>
