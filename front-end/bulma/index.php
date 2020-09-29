<?php
$title =  'Pruebas con Bulma CSS';
?>

<!DOCTYPE html>
<html lang="es">
<?php require 'layout/header.php'; ?>

<body>
   <?php require 'layout/navbar.php'; ?>
   
   <div class="container is-mobile">

      <div class="message mt-5">
         <div class="message-header">
            <p>Información importante!</p>
            <button class="delete"></button>
         </div>
         <div class="message-body">
            <p class="block">
               Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis ipsam commodi earum suscipit voluptatibus! Reprehenderit aut delectus hic dolore. Autem, est culpa perspiciatis <a>aperiam rerum</a> ex ducimus recusandae doloribus nulla.
            </p>
            <div class="block">
               <button class="button">
                  Seguir leyendo...
               </button>
               <button class="button is-dark">
                  Buscar en el archivo
               </button>
            </div>
         </div>
      </div>

      <div class="message">
         <div class="message-header">
            <p>Información importante!</p>
            <button class="delete"></button>
         </div>
         <div class="message-body">
            <p class="block">
               Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis ipsam commodi earum suscipit voluptatibus! Reprehenderit aut delectus hic dolore. Autem, est culpa perspiciatis <a>aperiam rerum</a> ex ducimus recusandae doloribus nulla.
            </p>
            <div class="block">
               <button class="button">
                  Seguir leyendo...
               </button>
               <button class="button is-dark">
                  Buscar en el archivo
               </button>
            </div>
         </div>
      </div>

      <div class="columns">
         <div class="column">
            <div class="box">
               <article class="media">
                  <div class="media-left">
                     <figure class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                     </figure>
                  </div>
                  <div class="media-content">
                     <div class="content">
                     <p>
                        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                     </p>
                     </div>
                     <nav class="level is-mobile">
                     <div class="level-left">
                        <a class="level-item" aria-label="reply">
                           <span class="icon is-small">
                              <i class="fas fa-reply" aria-hidden="true"></i>
                           </span>
                        </a>
                        <a class="level-item" aria-label="retweet">
                           <span class="icon is-small">
                              <i class="fas fa-retweet" aria-hidden="true"></i>
                           </span>
                        </a>
                        <a class="level-item" aria-label="like">
                           <span class="icon is-small">
                              <i class="fas fa-heart" aria-hidden="true"></i>
                           </span>
                        </a>
                     </div>
                     </nav>
                  </div>
               </article>
            </div>
         </div>
         <div class="column">
            <div class="card">
               <div class="card-content">
                  <div class="media">
                     <div class="media-left">
                     <figure class="image is-48x48">
                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                     </figure>
                     </div>
                     <div class="media-content">
                     <p class="title is-4">John Smith</p>
                     <p class="subtitle is-6">@johnsmith</p>
                     </div>
                  </div>

                  <div class="content">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                     <a href="#">#css</a> <a href="#">#responsive</a>
                     <br>
                     <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="block">
         <p>
            <a>Un simple link</a>
         </p>
         <a class="button is-primary">Un simple botón</a>
         <a class="button is-link">Otro simple botón</a>
      </div>
      <div class="block">
         <h1 class="title">Título</h1>
         <h2 class="subtitle">Subtítulo</h2>
         <p class="has-text-primary-dark">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci facere ullam dicta, autem voluptas magni, corporis eos explicabo recusandae provident id, <a>officiis quaerat</a> minima illum dignissimos sunt porro esse voluptatem.</p>
      </div>

      <div class="columns">
         <div class="column">
            <div class="field">
               <label for="firstname" class="label is-small mb-1">
                  Nombre
               </label>
               <div class="control">
                  <input type="text" class="input" id="firstname" name="firstname">
               </div>
            </div>
         </div>
         <div class="column">
            <div class="field">
               <label for="lastname" class="label is-small mb-1">
                  Apellido
               </label>
               <div class="control">
                  <input type="text" class="input" id="lastname" name="lastname">
               </div>
               <p class="help has-text-link">Como figura en su DNI</p>
            </div>
         </div>
      </div>

      <div class="field is-horizontal">
         <div class="field-body">
            <div class="field">
               <label for="firstname" class="label is-small mb-1">
                  Nombre
               </label>
               <div class="control">
                  <input type="text" class="input" id="firstname" name="firstname">
               </div>
            </div>
            <div class="field">
               <label for="lastname" class="label is-small mb-1">
                  Apellido
               </label>
               <div class="control">
                  <input type="text" class="input" id="lastname" name="lastname">
               </div>
               <p class="help has-text-link">Como figura en su DNI</p>
            </div>
            <div class="field">
               <div class="control">
                  <label class="label is-small mb-1">
                     &nbsp;
                  </label>
                  <button class="button is-primary">
                     Procesar
                  </button>
               </div>
            </div>
         </div>
      </div>

   </div>

   <div class="columns mt-5">
      <div class="column is-4 is-offset-4">
         <section class="hero is-primary">
            <div class="hero-body">
               <figure class="image is-16by9">
                  <img src="https://bulma.io/images/placeholders/256x256.png">
               </figure>
            </div>
         </section>
      </div>
   </div>

   <?php require 'layout/navbar.js.php'; ?>
</body>
</html>