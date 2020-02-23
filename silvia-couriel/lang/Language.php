<?php

require_once 'Translations.php';

class Language
{

  private static $userLang;

  public static function getDefaultLang() {
    
    if (isset($_COOKIE['user-lang'])) {
      $lang = $_COOKIE['user-lang'];
      if (Translations::hasLang($lang)) {
        return $lang;
      }
    }

    return 'esp';

  }

  public static function setDefaultLang($lang) {

    if (Translations::hasLang($lang)) {
      setcookie('user-lang', $lang, time() + 60 * 60 * 24 * 30, '/');
    }

  }

  public static function changeLang($lang) {

    if (Translations::hasLang($lang)) {
      self::$userLang = $lang;
    }

  }

  public static function lang($key) {

    return Translations::lang(self::$userLang, $key);

  }

}
