<?php

require "functions.php";

$routes = [
  '/' => [
    'whatToDo' => fn() => renderPage('main'),
  ],

  '/katalog/svezhie-ovoshi-i-frukty' => [
    'whatToDo' => fn() => renderPage('katalog', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya']]),
  ],
  '/katalog/udobreniya' => [
    'whatToDo' => fn() => renderPage('katalog', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya']]),
  ],
  '/katalog/szr' => [
    'whatToDo' => fn() => renderPage('katalog', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya']]),
  ],

  '/katalog/udobreniya/nitrat-kaltsiya' => [
    'whatToDo' => fn() => renderPage('katalog/udobreniya/nitrat-kaltsiya', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'Удобрения' => '/katalog/udobreniya', 'Нитрат кальция Концентрированный' => '/katalog/udobreniya/nitrat-kaltsiya']]),
  ],
  '/katalog/udobreniya/nitrat-kaltsiya/spec' => [
    'whatToDo' => fn() => sendSpecForViewing('nitrat-kalc-spec.pdf'),
  ],
  '/katalog/udobreniya/monokaliyfosfat' => [
    'whatToDo' => fn() => renderPage('katalog/udobreniya/monokaliyfosfat', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'Удобрения' => '/katalog/udobreniya', 'Монокалийфосфат' => '/katalog/udobreniya/monokaliyfosfat']]),
  ],
  '/katalog/udobreniya/monokaliyfosfat/spec' => [
    'whatToDo' => fn() => sendSpecForViewing('mono-spec.pdf'),
  ],
  '/katalog/udobreniya/sulfat-kaliya' => [
    'whatToDo' => fn() => renderPage('katalog/udobreniya/sulfat-kaliya', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'Удобрения' => '/katalog/udobreniya', 'Сульфат калия' => '/katalog/udobreniya/sulfat-kaliya']]),
  ],
  '/katalog/udobreniya/sulfat-kaliya/spec' => [
    'whatToDo' => fn() => sendSpecForViewing('sulfat-kaliya.pdf'),
  ],

  '/katalog/szr/supra-se' => [
    'whatToDo' => fn() => renderPage('katalog/szr/supra-se', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'СЗР' => '/katalog/szr', 'Супра, СЭ' => '/katalog/szr/supra-se']]),
  ],
  '/katalog/szr/chugur-sk' => [
    'whatToDo' => fn() => renderPage('katalog/szr/chugur-sk', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'СЗР' => '/katalog/szr', 'Чугур, СК' => '/katalog/szr/chugur-sk']]),
  ],
  '/katalog/szr/kunicza-ks' => [
    'whatToDo' => fn() => renderPage('katalog/szr/kunicza-ks', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'СЗР' => '/katalog/szr', 'Куница, КС' => '/katalog/szr/kunicza-ks']]),
  ],
  '/katalog/szr/metatron-ks' => [
    'whatToDo' => fn() => renderPage('katalog/szr/metatron-ks', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'СЗР' => '/katalog/szr', 'Метатрон, КС' => '/katalog/szr/metatron-ks']]),
  ],
  '/katalog/szr/groza-vr' => [
    'whatToDo' => fn() => renderPage('katalog/szr/groza-vr', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'СЗР' => '/katalog/szr', 'Гроза, ВР' => '/katalog/szr/groza-vr']]),
  ],
  '/katalog/szr/groza-ultra-vr' => [
    'whatToDo' => fn() => renderPage('katalog/szr/groza-ultra-vr', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'СЗР' => '/katalog/szr', 'Гроза Ультра, ВР' => '/katalog/szr/groza-ultra-vr']]),
  ],
  '/katalog/szr/gerbisan-se' => [
    'whatToDo' => fn() => renderPage('katalog/szr/gerbisan-se', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'СЗР' => '/katalog/szr', 'Гербисан, СЭ' => '/katalog/szr/gerbisan-se']]),
  ],
  '/katalog/szr/betrisan-ke' => [
    'whatToDo' => fn() => renderPage('katalog/szr/betrisan-ke', ['breadcrumbs' => ['Главная' => '/', 'Каталог' => '/katalog/udobreniya', 'СЗР' => '/katalog/szr', 'Бетрисан, КЭ' => '/katalog/szr/betrisan-ke']]),
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
  '/pers-danniye' => [
    'whatToDo' => fn() => renderHtml('pers-danniye'),
  ],
  '404' => [
    'whatToDo' => function() {
      http_response_code(404);
      renderPage('404');
    },
  ]
];
setRoutes($routes);