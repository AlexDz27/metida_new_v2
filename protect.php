<?php

$username = 'iklprqsSdef';
$password = '04l/op901kqoplY';
// Check if the user has provided the correct authentication details
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || 
  $_SERVER['PHP_AUTH_USER'] !== $username || $_SERVER['PHP_AUTH_PW'] !== $password) {

  // Send headers to trigger the browser's basic authentication prompt
  header('WWW-Authenticate: Basic realm="Protected Area"');
  header('HTTP/1.0 401 Unauthorized');
  
  // Display a message if authentication fails
  echo 'Вы должны ввести логин и пароль, чтобы зайти на эту страницу.';
  exit;
}