<?php
require "protect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админ-панель - Создать новость | Метида</title>
  <link rel="stylesheet" href="style/css/04ksdi9qsLjp1467jq-write.css">
  <script src="js/editorjs.umd.js" defer></script>
  <script src="js/editorjs-header.js" defer></script>
  <script src="js/editorjs-image.js" defer></script>
  <script src="js/editorjsHTML.js" defer></script>
  <script src="js/editor.js" defer></script>
</head>
<body>
  <h1>Создание новости</h1>
  <input class="input-title" name="title" placeholder="Напишите здесь название новости">
  <label class="input-img">
    Выберите картинку, которая будет "обложкой" для новости:
    <input type="file" id="inputImg" name="img">
  </label>
  <div id="editorjs"></div>
  <button type="button">Создать новость</button>
</body>
</html>