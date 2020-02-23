<?php

require_once 'Entity.php';

class User extends Entity
{
   public function __construct() {
      parent::__construct();
   }
   
   public function selectAll() : array {
      if ($this->storage instanceof DbStorage) {
         $this->storage->setQuery('SELECT * FROM users');
         $rows = $this->storage->select();
      }
      elseif ($this->storage instanceOf JsonStorage) {
         $rows = $this->storage->select();
      }
      else {
         $rows = [];
      }

      $users = parent::createArray($rows);
      return $users;
   }

   public function select(string $email) : ?Entity {
      if ($this->storage instanceof DbStorage) {
         $this->storage->setQuery('SELECT * FROM users WHERE email = :email');
         $rows = $this->storage->select([ 'email' => $email ]);
      }
      elseif ($this->storage instanceOf JsonStorage) {
         $rows = $this->storage->select([ 'email' => $email ]);
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

   public function exists(string $email) : bool {
      if ($this->storage instanceof DbStorage) {
         $this->storage->setQuery('SELECT COUNT(*) AS cantidad FROM users WHERE email = :email');
         $rows = $this->storage->select([ 'email' => $email ]);
      }
      elseif ($this->storage instanceOf JsonStorage) {
         $rows = $this->storage->select([ 'email' => $email ]);
      }
      else {
         $rows = [];
      }

      return $rows[0]['cantidad'] == 1;
   }

   public function insert(array $datos) : ?Entity {
      if ($this->storage instanceof DbStorage) {
         $this->storage->setQuery('INSERT INTO users
            (first_name, last_name, email,
            password, avatar_url, created_at)
            VALUES (:first_name, :last_name, :email,
            :password, :avatar_url, :created_at)'
         );
         $exito = $this->storage->insert($datos);
      }
      elseif ($this->storage instanceOf JsonStorage) {
         $exito = $this->storage->insert($datos);
      }
      else {
         $exito = false;
      }

      if ($exito) {
         $datos['id'] = $this->storage->getLastInsertId();
         $user = parent::createInstance($datos);
         return $user;
      }
      return null;
   }
}
