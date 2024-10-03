<?php

$curCat = $_GET['cat'];

?>

<div class="breadcrumbs-wrapper container">

    <section class="breadcrumbs">
    
        <?php foreach ($breadcrumbs as $bName => $bLink): ?>
          <a href="<?= $bLink ?>" class="breadcrumbs__item"><?= $bName ?></a>
          <?php if (end($breadcrumbs) !== $bLink): ?>
            <div class="breadcrumbs__arrow">
              <img src="/style/img/breadcrumbs-arrow.svg" alt="">
            </div>
          <?php endif ?>
        <?php endforeach ?>  
        
    </section>

    <div class="search-input">
        <input type="search" name="" id="" placeholder="Поиск">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.6714 18.0942L15.8949 14.3287C17.1134 12.7764 17.7745 10.8595 17.7721 8.88603C17.7721 7.12854 17.2509 5.41052 16.2745 3.94922C15.2981 2.48792 13.9103 1.34897 12.2866 0.676412C10.6629 0.00385016 8.87617 -0.172123 7.15245 0.170746C5.42873 0.513616 3.84539 1.35993 2.60266 2.60266C1.35993 3.84539 0.513616 5.42873 0.170746 7.15245C-0.172123 8.87617 0.00385016 10.6629 0.676412 12.2866C1.34897 13.9103 2.48792 15.2981 3.94922 16.2745C5.41052 17.2509 7.12854 17.7721 8.88603 17.7721C10.8595 17.7745 12.7764 17.1134 14.3287 15.8949L18.0942 19.6714C18.1974 19.7755 18.3203 19.8582 18.4556 19.9146C18.591 19.971 18.7362 20 18.8828 20C19.0294 20 19.1746 19.971 19.31 19.9146C19.4453 19.8582 19.5682 19.7755 19.6714 19.6714C19.7755 19.5682 19.8582 19.4453 19.9146 19.31C19.971 19.1746 20 19.0294 20 18.8828C20 18.7362 19.971 18.591 19.9146 18.4556C19.8582 18.3203 19.7755 18.1974 19.6714 18.0942ZM2.22151 8.88603C2.22151 7.56791 2.61238 6.2794 3.34468 5.18342C4.07699 4.08745 5.11785 3.23324 6.33563 2.72882C7.55341 2.22439 8.89342 2.09242 10.1862 2.34957C11.479 2.60672 12.6665 3.24145 13.5986 4.1735C14.5306 5.10555 15.1653 6.29306 15.4225 7.58585C15.6796 8.87864 15.5477 10.2186 15.0432 11.4364C14.5388 12.6542 13.6846 13.6951 12.5886 14.4274C11.4927 15.1597 10.2041 15.5505 8.88603 15.5505C7.11849 15.5505 5.42334 14.8484 4.1735 13.5986C2.92366 12.3487 2.22151 10.6536 2.22151 8.88603Z" fill="#D9D9D9"/>
        </svg>            
    </div>
</div>

<section class="container section">
    <h1 class="section__title">Каталог</h1>

    <div class="catalog">
      <!-- TODO: подумать с undefined -->
        <?php if ($_GET['cat'] === 'svezhie-ovoshi-i-frukty'): ?>
          <aside class="catalog__sidebar catalog-sidebar">
              <a href="javascript:void(0)" class="catalog-sidebar__item catalog-sidebar__item_active">Все</a>
              <a href="javascript:void(0)" class="catalog-sidebar__item">Тепличные овощи</a>
              <a href="javascript:void(0)" class="catalog-sidebar__item">Овощи защищённого грунта</a>
              <a href="javascript:void(0)" class="catalog-sidebar__item">Фрукты</a>
          </aside>
        <?php elseif ($_GET['cat'] === 'udobreniya'): ?>
          <aside class="catalog__sidebar catalog-sidebar">
              <a href="javascript:void(0)" class="catalog-sidebar__item catalog-sidebar__item_active">Все</a>
          </aside>
        <?php elseif ($_GET['cat'] === 'szr'): ?>
          <aside class="catalog__sidebar catalog-sidebar">
              <a href="javascript:void(0)" class="catalog-sidebar__item catalog-sidebar__item_active">Все</a>
              <a href="javascript:void(0)" class="catalog-sidebar__item">Гербициды</a>
              <a href="javascript:void(0)" class="catalog-sidebar__item">Фунгициды</a>
          </aside>
        <?php endif; ?>  
        <div class="catalog__body">
            <div class="catalog__cats">
                <a href="javascript:void(0)" class="catalog__cat">Семена</a>
                <a href="/katalog?cat=svezhie-ovoshi-i-frukty" class="catalog__cat <?php if ($curCat === 'svezhie-ovoshi-i-frukty'): ?>catalog__cat_active<?php endif; ?>">Свежие овощи и фрукты</a>
                <a href="/katalog?cat=udobreniya" class="catalog__cat <?php if ($curCat === 'udobreniya'): ?>catalog__cat_active<?php endif; ?>">Удобрения</a>
                <a href="/katalog?cat=szr" class="catalog__cat <?php if ($curCat === 'szr'): ?>catalog__cat_active<?php endif; ?>">Средства защиты растений</a>
            </div>
            <div class="catalog__products">
            <?php if ($_GET['cat'] === 'svezhie-ovoshi-i-frukty'): ?>
              <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/og-sr.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Огурец среднеплодный</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
                <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/apples-resized.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Яблоко</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
            <?php elseif ($_GET['cat'] === 'udobreniya'): ?>
              <div class="catalog__product product-card catalog__product-nitrat">
                  <div class="product-card__img">
                      <img src="/img/katalog/udobreniya/kalc.png" alt="">
                  </div>
                  <div class="product-card__content">
                      <h3 class="product-card__title">Нитрат кальция</h3>
                      <div class="product-card__btns">
                          <a href="/katalog/udobreniya/nitrat-kaltsiya" class="btn-outline">Подробнее </a>
                      </div>
                  </div>
              </div>
              <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/mono.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Монокалийфосфат</h3>
                        <div class="product-card__btns">
                            <a href="product.html" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
                <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/sulf.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Сульфат калия</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
            <?php elseif ($_GET['cat'] === 'szr'): ?>
              <div class="catalog__product product-card catalog__product-supra">
                    <div class="product-card__img">
                        <img src="img/katalog/szr/supra.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Супра, СЭ</h3>
                        <div class="product-card__btns">
                            <a href="/katalog/szr/supra-se" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
                <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/chugur-sk.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Чугур, СК</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
                <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/kunicza-ks.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Куница, КС</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
                <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/metatron-ks.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Метатрон, КС</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
                <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/groza-vr.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Гроза, ВР</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
                <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/gerbisan-se.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Гербисан, СЭ</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
                <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/bretiskan-big__jpg.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Бетрисан, КЭ</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
                <div class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="img/groza-ultra-vr.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Гроза Ультра, ВР</h3>
                        <div class="product-card__btns">
                            <a href="javascript:void(0)" class="btn-outline">Подробнее </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?> 
            </div>
        </div>
    </div>
</section>

<script>
    function moveCats() {
        if (window.innerWidth < 768) {
            let $cats = $(".catalog__cats");
            if (!$(".catalog__cats").parent().hasClass("catalog")) {
                $cats.insertBefore(".catalog__sidebar")
            }
        } else {
            let $cats = $(".catalog__cats");
            if ($(".catalog__cats").parent().hasClass("catalog")) {
                $cats.insertBefore(".catalog__products")
            }
        }
    }
    $(window).resize(moveCats)

    moveCats()
</script>