<?php

$errors = [];

if ($_POST) {

  if (! isset($_POST['name']) || empty(trim($_POST['name']))) {
    $errors['name'] = 'contact.form.required';
    // el mensaje de error devuelto es la clave para
    // buscar la traducción al idioma seleccionado
    // por el usuario (en Translations.php)
  }

  if (! isset($_POST['email']) || empty(trim($_POST['email']))) {
    $errors['email'] = 'contact.form.required';
  }
  elseif (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'contact.form.email-wrong-format';
  }

  if (! isset($_POST['message']) || empty(trim($_POST['message']))) {
    $errors['message'] = 'contact.form.required';
  }

  if (empty($errors)) {
    sendmail();
    header('location: main.php?menu=mailsent&name=' . $_POST['name']);
    exit;
  }

}

function sendmail()
{
  $to = 'Silvia Couriel <courielsilvia@gmail.com>';
  $subject = mb_encode_mimeheader('Silvia, te contactaron desde tu página web');
  $message_head = $_POST['name'] . ' escribió el ' . date('d-m-Y H:i') . "<br><br>";
  $message = $message_head . str_replace("\r\n", "<br>", $_POST['message']);
  $headers = 'From: ' . $_POST['email'] . "\n";
  $headers .= 'Reply-To: ' . $_POST['email'] . "\n";
  $headers .= 'Content-Type: text/html';
  // $headers .= 'X-Mailer: PHP/' . phpversion();

  // $headers = [
  //     'From' => $_POST['email'],
  //     'Reply-To' => $_POST['email'],
  //     'X-Mailer' => 'PHP/' . phpversion()
  // ];

  $result = mail($to, $subject, $message, $headers);
  // var_dump($message);
  // var_dump($result);
  // exit;
}
