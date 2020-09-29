<?php

require_once __DIR__ . '/Entity.php';

class User Extends Entity
{
   public function fullNameAttribute()
   {
      return $this->first_name . ' ' . $this->last_name;
   }
}
