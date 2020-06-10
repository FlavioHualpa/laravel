<?php require '../lang/lang.php'?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/css/styles.css">
   <title>Néstor Zadoff</title>
</head>
<body>

   <header class="banner">
   </header>

   <div class="container">
      <div class="error-404">
         <h1>:( 404</h1>
         <h3><?=lang('notfound.text.5')?></h3>
         <p>&nbsp;</p>
         <p>
            <?=lang('notfound.text.6')?>
            <a href="javascript:history.back()">
               <?=lang('notfound.text.7')?>
            </a>
            <?=lang('notfound.text.8')?>
         </p>
      </div>
   </div>

</body>
</html>
