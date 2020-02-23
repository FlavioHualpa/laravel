<?php

$counter = [ "visits" => 0 ];
file_put_contents('counter.json', json_encode($counter));
echo "Archivo Json generado.";
