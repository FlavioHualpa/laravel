<?php

require_once __DIR__ . '/Entity.php';

class PasswordReset Extends Entity
{
   protected $tableName = 'password_resets';
   protected $timestamps = false;
}
