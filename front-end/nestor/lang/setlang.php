<?php

require 'lang.php';

if (isset($_GET['lang']))
{
   $lang = $_GET['lang'];
   set_language($lang);

   $previous_url = $_SERVER['HTTP_REFERER'];

   header('location:' . $previous_url);
}
