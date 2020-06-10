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
         <h1>:( 500</h1>
         <br>
         <h3><?=lang('notconn.text.1')?></h3>
         <h3><?=lang('notconn.text.2')?></h3>
         <p>&nbsp;</p>
         <p>
            <?=lang('notfound.text.3')?>
            <a href="/index.php">
               <?=lang('notfound.text.4')?>
            </a>
         </p>
      </div>
   </div>

</body>
</html>
