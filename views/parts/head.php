<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if (str_contains($pageName, 'katalog')): ?>
    <title>Каталог | МЕТИДА-ТОРГ</title>
  <?php else: ?>
    <title>МЕТИДА-ТОРГ</title>
  <?php endif ?>  
  <link rel="stylesheet" href="/style/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="/style/css/style-sasha.css">
  <?php if ($pageName === 'main'): ?>
    <script src="/js/jquery-3.3.1.min.js" defer></script>
    <!-- TODO: minify ui; разве нужен он на мейне? -->
    <script src="/js/jquery-ui.js" defer></script>
    <script src="/js/magnific.min.js" defer></script>
  <?php elseif (str_contains($pageName, 'katalog')): ?>
    <script src="/js/jquery-3.3.1.min.js" defer></script>
    <script src="/js/jquery-ui.js" defer></script>
    <script src="/js/magnific.min.js" defer></script>
  <?php elseif ($pageName === 'about' || $pageName === 'contacts'): ?>
    <script src="/js/main.js" defer></script>
  <?php endif; ?>  
  <!-- <script src="js/app.min.js" defer></script> -->
  <script src="/js/swiper-bundle.min.js" defer></script>
  <?php if ($pageName === 'main'): ?>
    <script src="/js/main.js" defer></script>
  <?php elseif (str_contains($pageName, 'katalog')): ?>
    <script src="/js/katalog.js" defer></script>
  <?php endif; ?>  
</head>
  <body>
    <section class="popup" data-popup="1">
      <form class="popup__inner">
          <div class="popup__close">
              <img id="popupClose" src="/style/img/close.svg" alt="">
          </div>
          <h2 class="popup__title">Оставьте заявку</h2>
          <p class="popup__subtitle">
              Заполните форму и мы свяжемся с вами в ближайшее время
          </p>
          <div class="popup__inputs">
              <label for="" class="popup__label">Ваше имя</label>
              <input class="popup__input" name="name" placeholder="Иван Иванов" required>
              <label for="" class="popup__label">Номер телефона</label>
              <input class="popup__input" name="phone" placeholder="+375 (29) XXX–XX–XX" data-tel-by-input required>
              <label for="" class="popup__label">Email (необязательно)</label>
              <input class="popup__input" name="email" placeholder="pochta@mail.by">
              <label for="" class="popup__label">Название вашей организации</label>
              <input class="popup__input" name="company" placeholder="ООО «Метида-торг»" required>
              <label for="" class="popup__label">Ваше сообщение</label>
              <textarea class="popup__input" rows="3" name="msg" required placeholder="Хочу закупить кукурузу. Свяжитесь со мной и сделайте коммерческое предложение…"></textarea>
              <label class="popup__confirm">
                  <input type="checkbox" required>
                  Согласен на обработку персональных данных
              </label>
          </div>
          <button type="submit" class="btn-cta popup__btn">Отправить</button>
      </form>
    </section>

    <section class="popup spasibo" data-popup="2">
      <form class="popup__inner">
          <div class="popup__cover">
              <img src="/style/img/spasibo.jpg" alt="">
          </div>
          <h2 class="popup__title">Спасибо за обращение!</h2>
          <p class="popup__subtitle">
              Наши специалисты свяжутся с вами в ближайшее время
          </p>
          <button type="button" class="btn-cta popup__btn" data-popup-close>закрыть</button>
      </form>
    </section>

    <header>
      <section class="top-menu cont">
        <a class="logo-link" href="/">
          <img src="/style/img/logo.png">
        </a>
        <div class="top-menu-contacts">
          <div>
            <span class="icon">
              <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.2496 12.5466H7.49976C7.15459 12.5466 6.87478 12.2685 6.87478 11.9254C6.87478 11.5824 7.15459 11.3043 7.49976 11.3043H12.2496C13.6281 11.3043 14.7495 10.1898 14.7495 8.81986V3.7267C14.7495 2.35677 13.6281 1.24223 12.2496 1.24223H3.74988C2.37143 1.24223 1.24996 2.35677 1.24996 3.7267V8.5093C1.24996 8.68055 1.39014 8.81986 1.56245 8.81986H3.43739C3.78257 8.81986 4.06237 9.09793 4.06237 9.44098C4.06237 9.78402 3.78257 10.0621 3.43739 10.0621H1.56245C0.700915 10.0621 0 9.36552 0 8.5093V3.7267C0 1.6718 1.6822 0 3.74988 0H12.2496C14.3173 0 15.9995 1.6718 15.9995 3.7267V8.81986C15.9995 10.8748 14.3173 12.5466 12.2496 12.5466ZM5.62482 11.9248C5.62482 11.5818 5.34502 11.3037 4.99984 11.3037H0.62498C0.279804 11.3037 0 11.5818 0 11.9248C0 12.2678 0.279804 12.5459 0.62498 12.5459H4.99984C5.34502 12.5459 5.62482 12.2678 5.62482 11.9248ZM7.49976 14.3789C7.49976 14.0358 7.21996 13.7577 6.87478 13.7577H0.62498C0.279804 13.7577 0 14.0358 0 14.3789C0 14.7219 0.279804 15 0.62498 15H6.87478C7.21996 15 7.49976 14.7219 7.49976 14.3789ZM10.2883 7.37396L13.3149 5.09098C13.5899 4.88359 13.6436 4.49397 13.4349 4.22074C13.2263 3.94754 12.8342 3.89409 12.5592 4.10152L9.53142 6.38536C8.6392 7.06157 7.3933 7.062 6.50086 6.38651L3.56948 4.13577C3.29633 3.92605 2.90378 3.97608 2.69279 4.24757C2.48177 4.51903 2.53211 4.9091 2.80529 5.11884L5.73816 7.37076L5.74126 7.37309C6.41089 7.8807 7.21337 8.13442 8.01575 8.13442C8.81772 8.13442 9.61957 7.88089 10.2883 7.37396Z" fill="white"/>
              </svg>
            </span>
            <span class="top-menu-contacts-email">metidatorg@gmail.com</span>
          </div>
          <div>
            <span class="icon">
              <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.87478 15.9995H3.1249C1.40183 15.9995 0 14.5977 0 12.8746V3.1249C0 1.40183 1.40183 0 3.1249 0H6.87478C8.59785 0 9.99969 1.40183 9.99969 3.1249V12.8746C9.99969 14.5977 8.59785 15.9995 6.87478 15.9995ZM3.1249 1.24996C2.09106 1.24996 1.24996 2.09106 1.24996 3.1249V12.8746C1.24996 13.9084 2.09106 14.7495 3.1249 14.7495H6.87478C7.90863 14.7495 8.74972 13.9084 8.74972 12.8746V3.1249C8.74972 2.09106 7.90863 1.24996 6.87478 1.24996H3.1249Z" fill="white"/>
                <path d="M5.62494 13.5H4.37498C4.02981 13.5 3.75 13.2202 3.75 12.875C3.75 12.5298 4.02981 12.25 4.37498 12.25H5.62494C5.97012 12.25 6.24992 12.5298 6.24992 12.875C6.24992 13.2202 5.97012 13.5 5.62494 13.5Z" fill="white"/>
                <path d="M5.62482 3.74988H4.37486C4.02969 3.74988 3.74988 3.47008 3.74988 3.1249C3.74988 2.77972 4.02969 2.49992 4.37486 2.49992H5.62482C5.97 2.49992 6.2498 2.77972 6.2498 3.1249C6.2498 3.47008 5.97 3.74988 5.62482 3.74988Z" fill="white"/>
                </svg>
            </span>
            <span class="top-menu-contacts-phone">+375 (17) 502 - 34 - 47</span>
          </div>
        </div>
        <button id="ost-zayav" class="btn-cta btn-cta-with-glow" type="button">Оставить заявку</button>
        <button class="burger" type="button"></button>
      </section>
      <nav>
        <a href="/about">О нас</a>
        <a href="/katalog/udobreniya">Продукция</a>
        <a href="/news">Новости</a>
        <a href="/contacts">Контакты</a>
      </nav>
    </header>