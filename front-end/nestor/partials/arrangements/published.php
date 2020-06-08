      <section class="text">

         <h2 class="title">
            <?=lang('published.title.1')?>
         </h2>
         <br>
         <p>
            <?=lang('published.parag.1')?>
         </p>
         <br>

         <?php foreach (lang('published.editors') as $editor) : ?>
         <article class="editors-group">
            <p>
               <?=$editor['name']?>
            </p>
            <p>
               <?=$editor['contact']?>
            </p>
            <br>
            <ul>
               <?php foreach ($editor['publications'] as $item) : ?>
               <li>
                  <?= $item ?>
               </li>
               <?php endforeach ?>
            </ul>
         </article>
         <p>&nbsp;</p>
         <?php endforeach ?>
      
      </section>