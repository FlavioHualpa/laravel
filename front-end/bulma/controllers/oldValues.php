<?php

function old($inputName, $default = null)
{
   return $_POST[$inputName] ?? $default;
}
