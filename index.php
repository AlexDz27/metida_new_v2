<?php

require "functions.php";

$routes = [
  '/' => [
    'whatToDo' => fn() => renderPage('main'),
  ],

  '/katalog/svezhie-ovoshi-i-frukty' => [
    'whatToDo' => fn() => renderPage('katalog', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog']]),
  ],
  '/katalog/udobreniya' => [
    'whatToDo' => fn() => renderPage('katalog', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog']]),
  ],
  '/katalog/szr' => [
    'whatToDo' => fn() => renderPage('katalog', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog']]),
  ],

  '/katalog/szr/supra-se' => [
    'whatToDo' => fn() => renderPage('katalog/szr/supra-se', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog', 'СЗР' => '/katalog?cat=szr', 'Супра, СЭ' => '/katalog/szr/supra-se']]),
  ],
  '/katalog/szr/chugur-sk' => [
    'whatToDo' => fn() => renderPage('katalog/szr/chugur-sk', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog', 'СЗР' => '/katalog?cat=szr', 'Чугур, СК' => '/katalog/szr/chugur-sk']]),
  ],
  '/katalog/udobreniya/nitrat-kaltsiya' => [
    'whatToDo' => fn() => renderPage('katalog/udobreniya/nitrat-kaltsiya', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog', 'Удобрения' => '/katalog?cat=udobreniya', 'Нитрат кальция Концентрированный' => '/katalog/udobreniya/nitrat-kaltsiya']]),
  ],

  '/about' => [
    'whatToDo' => fn() => renderPage('about'),
  ],
  '/news' => [
    'whatToDo' => fn() => renderPage('news', ['breadcrumbs' => ['Главная' => '/', 'Новости' => '/news']]),
  ],
  '/news/news-single' => [
    'whatToDo' => fn() => renderPage('news-single', ['breadcrumbs' => ['Главная' => '/', 'Новости' => '/news', 'Новость 1' => '/news-single']]),
  ],
  '/contacts' => [
    'whatToDo' => fn() => renderPage('contacts', ['breadcrumbs' => ['Главная' => '/', 'Контакты' => '/contacts']]),
  ],
  '404' => [
    'whatToDo' => function() {
      http_response_code(404);
      renderPage('404');
    },
  ]
];
setRoutes($routes);