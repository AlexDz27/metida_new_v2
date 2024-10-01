<?php

$allowedTypes = ['image/jpeg', 'image/png'];
$maxFileSize = 2 * 1024 * 1024; // 2 MB

move_uploaded_file(
  $_FILES['image']['tmp_name'],
  "posts-images/" . $_FILES['image']['name']
);

echo json_encode([
  'success' => 1,
  'file' => [
    'url' => '/posts-images/' . $_FILES['image']['name']
  ]
], JSON_UNESCAPED_UNICODE);