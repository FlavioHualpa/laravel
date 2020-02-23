<?php

// var_dump(realpath('/wamp64/www/sites/ayudarnos'));
// var_dump(__DIR__);
// var_dump($_SERVER['SCRIPT_NAME']);

require_once __DIR__.'/../entities/DbStorage.php';
require_once __DIR__.'/../entities/Entity.php';
require_once __DIR__.'/../entities/User.php';

class Auth
{
   private static $db;

   private function __construct()
   {
      //
   }

   public static function connectToDb()
   {
      if (self::$db === null) {
         self::$db = new DbStorage();
         self::$db->connect();
      }
   }
   
   public static function user() : ?Entity
   {
      // session_start();
      
      return isset($_SESSION['user-email']) ? User::select(self::$db, $_SESSION['user-email']) : null;
   }

   public static function userAutoLog()
   {
      if (isset($_COOKIE['user-email'])) {
         $user = User::select(self::$db, $_COOKIE['user-email']);
         if ($user) {
            self::loginUser(
               [
                  'id' => $user->id,
                  'first-name' => $user->first_name,
                  'email' => $user->email,
               ]
            );
         }
      }
   }

   public static function userLogged() : bool
   {
      // session_start();

      return isset($_SESSION['user-email']);
   }

   public static function loginUser(array $user)
   {
      // session_start();

      $_SESSION['user-id'] = $user['id'];
      $_SESSION['user-first-name'] = $user['first-name'];
      $_SESSION['user-email'] = $user['email'];
   }

   public static function logoutUser()
   {
      session_start();
      session_destroy();
   }
}

session_start();
Auth::connectToDb();
Auth::userAutoLog();
$user = Auth::user();
