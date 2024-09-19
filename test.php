<?php

$arr = [
  'qwe',
  'asd',
  'zxc'
];

echo floor(microtime(true) * 1000) . PHP_EOL;
foreach ($arr as $item) {
  echo $item . PHP_EOL;
}
echo floor(microtime(true) * 1000) . PHP_EOL;

// file_put_contents('test-json.json', json_encode($arr));