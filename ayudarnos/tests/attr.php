<?php

require_once 'Model.php';

$user = new Model();
echo $user->nombre;
echo '<br>';
echo $user->nacimiento;
echo '<br>';
echo $user->dni;
echo '<br>';
echo $user->password;
echo '<br>';
