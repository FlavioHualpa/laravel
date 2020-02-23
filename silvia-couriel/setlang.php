<?php

require_once 'lang/Language.php';

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'esp';
Language::setDefaultLang($lang);
header('location: main.php');
