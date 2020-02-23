<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// phpinfo();

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-4014737365882020-091400-cd190a1ed89ba49e53e574c0f7b7d610-470904988');
// este usuario de prueba lo creé el 13/9/19 con mi cuenta de MP

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Reloj de arena';
$item->quantity = 1;
$item->unit_price = 275.39;
$item->picture_url = 'https://http2.mlstatic.com/oferta-reloj-de-arena-decorativo-un-minuto-y-medio-D_NQ_NP_655161-MLA31040982134_062019-F.webp';
$preference->items = [ $item ];
$preference->save();

// var_dump($preference);
// exit();
?>
