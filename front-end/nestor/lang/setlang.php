<?php

require 'lang.php';

if (isset($_GET['lang']))
{
   $lang = $_GET['lang'];
   set_language($lang);

   header('location: ../index.php');
}
