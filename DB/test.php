<?php

require 'entity\User.php';

$user = new User;
$all = User::all();

foreach ($all as $row)
{
  echo $row->first_name . ' ' . $row->last_name . ' [' . $row->email . ']<br>';
}
