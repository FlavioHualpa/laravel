<?php

   function leer_json($ruta) {
      if (file_exists($ruta)) {
         $txt = file_get_contents($ruta);
         $json = json_decode($txt, true);
         return $json;
      }
      return null;
   }

   $fichas = leer_json('datos/fichas.json');

?>

<section id="fichas">
<?php if ($fichas) : ?>
   <?php foreach ($fichas as $ficha) : ?>
      <article>
         <div>
            <a href="<?= 'post.php?id_post=' . $ficha['id_post'] ?>">
               <img src="<?= $ficha['url_imagen'] ?>" alt="">
            </a>
         </div>
         <div>
            <div>
               <div>
                  <i class="fas fa-user-circle"></i>
               </div>
               <div>
                  <?= $ficha['posteado_por'] ?>
                  <br>
                  <?= $ficha['fecha_post'] . ' · ' . $ficha['tiempo_de_lectura'] . ' min' ?>
               </div>
            </div>
            <div>
               <h2><?= $ficha['titulo'] ?></h2>
            </div>
            <div>
               <?= $ficha['intro'] ?>
            </div>
            <div>
               <div>
                  <?= $ficha['vistas'] . ' views' ?>
               </div>
               <div>
                  <a href="#">Write a comment</a>
               </div>
               <div>
                  <i class="far fa-heart"></i>
               </div>
            </div>
         </div>
      </article>
   <?php endforeach; ?>
<?php endif; ?>
</section>
