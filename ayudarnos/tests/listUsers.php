<?php

require_once '../src/auth/Auth.php';
require_once '../src/entities/DbStorage.php';
require_once '../src/entities/User.php';

$db = new DbStorage;
$db->connect();

$users = User::selectAll($db);
var_dump(Auth::user()->id);
var_dump($users);
