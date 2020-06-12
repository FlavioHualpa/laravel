<?php

if ($_SERVER["REQUEST_METHOD"] != "POST")
{
   return;
}

$errors = [];
$input = $_POST;

if (! isset($input['name']) || empty($name = trim($input['name'])))
{
   $errors['name'] = lang('contact.error.1');
}

if (! isset($input['email']) || empty($email = trim($input['email'])))
{
   $errors['email'] = lang('contact.error.2');
}
elseif (! filter_var($email, FILTER_VALIDATE_EMAIL))
{
   $errors['email'] = lang('contact.error.3');
}

if (! isset($input['query']) || empty($query = trim($input['query'])))
{
   $errors['query'] = lang('contact.error.4');
}

if (empty($errors))
{
   sendmail($name, $email, $query);
   header('location: /thanks.php');
   exit;
}

function error($key)
{
   global $errors;

   if (isset($errors[$key])) 
   {
      return
         '<p class="error">
            ' . $errors[$key] . '
         </p>
         ';
   }

   return null;
}

function old($field)
{
   global $$field;

   return $$field ?? null;
}

function sendmail($name, $email, $query)
{
   $header = "From: " . $email . "\r\n";
   $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
   $header .= "Mime-Version: 1.0 \r\n";
   $header .= "Content-Type: text/plain";

   $body = "Consulta enviada por " . $name . " (" . $email . ") el " . date('d/m/Y', time()) . ".\r\n\r\n";
   $body .= $query;

   $to = 'info@nestorzadoff.com.ar';
   $to = 'flaviohualpa@gmail.com';
   $subject = 'CONSULTA DESDE TU WEB';

   mail($to, $subject, utf8_decode($body), $header);
}
