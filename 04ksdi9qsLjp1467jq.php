<?php

require "protect.php";

if ($_POST) {
  $allPopularsData = [
    "lyavon" => [
      "key" => "lyavon",
      "title" => "Морковь \"Лявониха\"",
      "imgSrc" => "qwe/qwe.png"
    ],
    "ais" => [
      "key" => "ais",
      "title" => "Кукуруза \"Айспекс\"",
      "imgSrc" => "qwe/ais.png"
    ],
    "zum" => [
      "key" => "zum",
      "title" => "Кукуруза \"Зумбер\"",
      "imgSrc" => "qwe/zum.png"
    ],
    "zima" => [
      "key" => "zima",
      "title" => "Рапс \"Зима\"",
      "imgSrc" => "qwe/zima.png"
    ],
    "zima-2" => [
      "key" => "zima-2",
      "title" => "Рапс \"Зима 2\"",
      "imgSrc" => "qwe/zima-2.png"
    ],
    "zima-3" => [
      "key" => "zima-3",
      "title" => "Рапс \"Зима 3\"",
      "imgSrc" => "qwe/zima-3.png"
    ],
    "zima-4" => [
      "key" => "zima-4",
      "title" => "Рапс \"Зима 4\"",
      "imgSrc" => "qwe/zima-4.png"
    ],
    "zima-5" => [
      "key" => "zima-5",
      "title" => "Рапс \"Зима 5\"",
      "imgSrc" => "qwe/zima-5.png"
    ]
  ];

  $chosenPopulars = [];
  foreach ($_POST as $chosenPopularKey) {
    $chosenPopulars[] = $allPopularsData[$chosenPopularKey];
  }
  
  file_put_contents('populars.json', json_encode($chosenPopulars, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
}

$populars = json_decode(file_get_contents('populars.json'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админ-панель | Метида</title>
  <link rel="stylesheet" href="style/css/04ksdi9qsLjp1467jq.css">
</head>
<body>
  <h1>Выберите товары, которые будут показаны как популярные</h1>
  <form method="post" action="04ksdi9qsLjp1467jq.php">
    <div>
      <label>Первый товар:
        <select name="popular-1">
          <option value="lyavon">Морковь "Лявониха"</option>
          <option value="ais">Кукуруза "Айспекс"</option>
          <option value="zum">Кукуруза "Зумбер"</option>
          <option value="zima">Рапс "Зима"</option>
          <option value="zima-2">Рапс "Зима" 2</option>
          <option value="zima-3">Рапс "Зима" 3</option>
          <option value="zima-4">Рапс "Зима" 4</option>
          <option value="zima-5">Рапс "Зима" 5</option>
        </select>
      </label>
    </div>
    <div>
      <label>Второй товар:
        <select name="popular-2">
          <option value="lyavon">Морковь "Лявониха"</option>
          <option value="ais">Кукуруза "Айспекс"</option>
          <option value="zum">Кукуруза "Зумбер"</option>
          <option value="zima">Рапс "Зима"</option>
          <option value="zima-2">Рапс "Зима" 2</option>
          <option value="zima-3">Рапс "Зима" 3</option>
          <option value="zima-4">Рапс "Зима" 4</option>
          <option value="zima-5">Рапс "Зима" 5</option>
        </select>
      </label>
    </div>
    <div>
      <label>Третий товар:
        <select name="popular-3">
          <option value="lyavon">Морковь "Лявониха"</option>
          <option value="ais">Кукуруза "Айспекс"</option>
          <option value="zum">Кукуруза "Зумбер"</option>
          <option value="zima">Рапс "Зима"</option>
          <option value="zima-2">Рапс "Зима" 2</option>
          <option value="zima-3">Рапс "Зима" 3</option>
          <option value="zima-4">Рапс "Зима" 4</option>
          <option value="zima-5">Рапс "Зима" 5</option>
        </select>
      </label>
    </div>
    <button type="submit">Принять</button>
  </form>

<script>
  <?php if ($_POST): ?>
    alert('Популярные продукты были обновлены')

    window.history.replaceState( null, null, window.location.href );
  <?php endif ?>  

  const popularsKeys = [
    '<?= $populars[0]->key ?>',
    '<?= $populars[1]->key ?>',
    '<?= $populars[2]->key ?>',
  ]
  const selects = document.querySelectorAll('select')
  selects.forEach((s, i) => {
    s.value = popularsKeys[i]
  })
</script>
</body>
</html>