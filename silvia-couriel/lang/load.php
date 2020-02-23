<?php

require_once 'Language.php';

Language::changeLang(
  Language::getDefaultLang()
);

function lang($key)
{
  return Language::lang($key);
}
