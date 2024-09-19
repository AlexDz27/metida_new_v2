<?php

$arr = json_decode(file_get_contents('test-json.json'));

echo floor(microtime(true) * 1000) . PHP_EOL;
foreach ($arr as $item) {
  echo $item . PHP_EOL;
}
echo floor(microtime(true) * 1000) . PHP_EOL;