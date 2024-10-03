<?php

function setRoutes($routes) {
  $uri = explode('?', $_SERVER['REQUEST_URI'])[0]; // explode to allow GET requests
  $method = $_SERVER['REQUEST_METHOD'];
  $route404 = array_pop($routes);

  foreach ($routes as $routeUri => $routeData) {
    if (!isset($routeData['method'])) $routeData['method'] = 'GET';
    
    if ($uri === $routeUri && $method === $routeData['method']) {
      $routeData['whatToDo']();
      return;
    }
  }

  $route404['whatToDo']();
}

function renderPage($pageName, $vars = []) {
  extract($vars);
  require "views/parts/head.php";
  require "views/pages/$pageName.php";
  require "views/parts/footer.php";
}