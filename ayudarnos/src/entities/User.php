<?php

require_once 'Entity.php';

class User extends Entity
{
   public static function selectAll(StorageInterface $storage) : array {
      if ($storage instanceof DbStorage) {
         $storage->setQuery('SELECT * FROM users');
         $rows = $storage->select();
      }
      elseif ($storage instanceOf JsonStorage) {
         $rows = $storage->select();
      }
      else {
         $rows = [];
      }

      $users = parent::createArray($rows);
      return $users;
   }

   public static function select(StorageInterface $storage, string $email) : ?Entity {
      if ($storage instanceof DbStorage) {
         $storage->setQuery('SELECT * FROM users WHERE email = :email');
         $rows = $storage->select([ 'email' => $email ]);
      }
      elseif ($storage instanceOf JsonStorage) {
         $rows = $storage->select([ 'email' => $email ]);
      }
      else {
         $rows = [];
      }

      if ($rows) {
         $user = parent::createInstance($rows[0]);
         return $user;
      }
      return null;
   }

   public static function exists(StorageInterface $storage, string $email) : bool {
      if ($storage instanceof DbStorage) {
         $storage->setQuery('SELECT COUNT(*) AS cantidad FROM users WHERE email = :email');
         $rows = $storage->select([ 'email' => $email ]);
      }
      elseif ($storage instanceOf JsonStorage) {
         $rows = $storage->select([ 'email' => $email ]);
      }
      else {
         $rows = [];
      }

      return $rows[0]['cantidad'] == 1;
   }

   public static function insert(StorageInterface $storage, array $datos) : ?Entity {
      if ($storage instanceof DbStorage) {
         $storage->setQuery('INSERT INTO users
            (first_name, last_name, email,
            password, avatar_url, created_at)
            VALUES (:first_name, :last_name, :email,
            :password, :avatar_url, :created_at)'
         );
         $exito = $storage->insert($datos);
      }
      elseif ($storage instanceOf JsonStorage) {
         $exito = $storage->insert($datos);
      }
      else {
         $exito = false;
      }

      if ($exito) {
         $datos['id'] = $storage->getLastInsertId();
         $user = parent::createInstance($datos);
         return $user;
      }
      return null;
   }
}
