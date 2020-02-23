<?php

require 'src\entities\User.php';

$db = new DbStorage;
$db->connect();

$users = User::selectAll($db);

// var_dump($users);

$users = Entity::toFlatArray($users);

echo json_encode($users, JSON_PRETTY_PRINT);
