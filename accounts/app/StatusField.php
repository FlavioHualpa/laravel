<?php

namespace App;

use Illuminate\Support\Str;

trait StatusField
{
   private $statusNames = [
      self::STATUS_ACTIVE => 'activo',
      self::STATUS_SUSPENDED => 'suspendido',
      self::STATUS_DISCONTINUED => 'discontinuado',
   ];

   private $cssClasses = [
      self::STATUS_ACTIVE => 'active-status',
      self::STATUS_SUSPENDED => 'suspended-status',
      self::STATUS_DISCONTINUED => 'discontinued-status',
   ];

   public function getStatusNameAttribute()
   {
      return Str::title($this->statusNames[$this->status]);
   }

   public function getCssClassAttribute()
   {
      return $this->cssClasses[$this->status];
   }
}