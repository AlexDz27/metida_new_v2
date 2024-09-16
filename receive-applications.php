<?php

require "db.php";

$name = $_POST['name'];
$phone = $_POST['phone'];
$company = $_POST['company'];
$email = $_POST['email'];
$msg = $_POST['msg'];

$errStr = "";
if (trim($name) === '') {
  $errStr .= 'Поле "Имя" пустое' . PHP_EOL;
}
if (trim($phone) === '') {
  $errStr .= 'Поле "Телефон" пустое' . PHP_EOL;
}
if (trim($company) === '') {
  $errStr .= 'Поле "Ваша компания" пустое' . PHP_EOL;
}
if (trim($msg) === '') {
  $errStr .= 'Поле "Сообщение" пустое' . PHP_EOL;
}
if (strlen($errStr) > 0) {
  echo $errStr;
} else {
  try {
    $applicationText = PHP_EOL . PHP_EOL . date('Y-m-d H:i:s') . PHP_EOL;
    $applicationText .= $name . PHP_EOL;
    $applicationText .= $phone . PHP_EOL;
    $applicationText .= $company . PHP_EOL;
    $applicationText .= $email . PHP_EOL;
    $applicationText .= $msg . PHP_EOL;
    file_put_contents('applications.txt', $applicationText, FILE_APPEND);

    $pdo = new PDO($dsn, $user, $pass, $opt);
    $stmt = $pdo->prepare("INSERT INTO applications (
      name, phone, company, email, msg) VALUES (
      :name, :phone, :company, :email, :msg)"
    );
    $stmt->execute($_POST);
  } catch (\PDOException $e) {
    $newEntry = date('Y-m-d H:i:s') . PHP_EOL . $e;
    $contents = PHP_EOL . $newEntry . PHP_EOL;
    if (!@mail("alexeydzyuba27@gmail.com", 'Ошибка на сайте Метиды', $newEntry, "From: metida-torg.by" . "\r\n")) {
      $contents .= PHP_EOL . 'Mailing error' . PHP_EOL;
    };

    $contents .= '------------------------------------------';
    file_put_contents('my-php-error-log.txt', $contents, FILE_APPEND);
  }

  echo 'Ваше сообщение успешно отправлено! Спасибо.';
}
