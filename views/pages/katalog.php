<?php
$uriTrimmed = rtrim($_SERVER['REQUEST_URI'], '/');
$curCat = substr($uriTrimmed, strrpos($uriTrimmed, '/') + 1);
?>
<?php require "views/parts/breadcrumbsWithSearch.php" ?>

<section class="container section">
    <h1 class="section__title">Каталог</h1>

    <div class="catalog">
      <!-- TODO: подумать с undefined -->
        <?php if ($curCat === 'svezhie-ovoshi-i-frukty'): ?>
          <aside class="catalog__sidebar catalog-sidebar">
              <a class="catalog-sidebar__item catalog-sidebar__item_active">Все</a>
              <a class="catalog-sidebar__item">Тепличные овощи</a>
              <a class="catalog-sidebar__item">Овощи защищённого грунта</a>
              <a class="catalog-sidebar__item">Фрукты</a>
          </aside>
        <?php elseif ($curCat === 'udobreniya'): ?>
          <aside class="catalog__sidebar catalog-sidebar">
              <a class="catalog-sidebar__item catalog-sidebar__item_active">Все</a>
          </aside>
        <?php elseif ($curCat === 'szr'): ?>
          <aside class="catalog__sidebar catalog-sidebar">
              <a class="catalog-sidebar__item catalog-sidebar__item_active">Все</a>
              <a class="catalog-sidebar__item">Гербициды</a>
              <a class="catalog-sidebar__item">Фунгициды</a>
          </aside>
        <?php endif; ?>  
        <div class="catalog__body">
            <div class="catalog__cats">
                <a href="javascript:void(0)" class="catalog__cat">Семена</a>
                <a href="/katalog/svezhie-ovoshi-i-frukty" class="catalog__cat <?php if ($curCat === 'svezhie-ovoshi-i-frukty'): ?>catalog__cat_active<?php endif; ?>">Свежие овощи и фрукты</a>
                <a href="/katalog/udobreniya" class="catalog__cat <?php if ($curCat === 'udobreniya'): ?>catalog__cat_active<?php endif; ?>">Удобрения</a>
                <a href="/katalog/szr" class="catalog__cat <?php if ($curCat === 'szr'): ?>catalog__cat_active<?php endif; ?>">Средства защиты растений</a>
            </div>
            <div class="catalog__products">
            <?php if ($curCat === 'svezhie-ovoshi-i-frukty'): ?>
              <a href="javascript:void(0)" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/svezhie-ovoshi-i-frukty/og-sr.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Огурец среднеплодный</h3>
                        <div class="product-card__btns">
                            <span href="" class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/svezhie-ovoshi-i-frukty/apples-resized.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Яблоко</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/svezhie-ovoshi-i-frukty/cherry.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Томат Черри</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
            <?php elseif ($curCat === 'udobreniya'): ?>
              <a href="/katalog/udobreniya/nitrat-kaltsiya" class="catalog__product product-card catalog__product-nitrat">
                  <div class="product-card__img">
                      <img src="/img/katalog/udobreniya/kalc.png" alt="">
                  </div>
                  <div class="product-card__content">
                      <h3 class="product-card__title">Нитрат кальция</h3>
                      <div class="product-card__btns">
                          <span class="btn-outline">Подробнее </span>
                      </div>
                  </div>
               </a>
              <a href="/katalog/udobreniya/monokaliyfosfat" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/udobreniya/mono.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Монокалийфосфат</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
                <a href="/katalog/udobreniya/sulfat-kaliya" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/udobreniya/sulf.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Сульфат калия</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
            <?php elseif ($curCat === 'szr'): ?>
              <a href="/katalog/szr/supra-se" class="catalog__product product-card catalog__product-supra">
                    <div class="product-card__img">
                        <img src="/img/katalog/szr/supra.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Супра, СЭ</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                 </a>
                <a href="/katalog/szr/chugur-sk" class="catalog__product product-card" id="chugur">
                    <div class="product-card__img">
                        <img src="/img/katalog/szr/chugur-sk.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Чугур, СК</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
                <a href="/katalog/szr/kunicza-ks" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/szr/kunicza-ks.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Куница, КС</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
                <a href="/katalog/szr/metatron-ks" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/szr/metatron-ks.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Метатрон, КС</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
                <a href="/katalog/szr/groza-vr" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/szr/groza-vr.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Гроза, ВР</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
                <a href="/katalog/szr/groza-ultra-vr" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/szr/groza-ultra-vr.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Гроза Ультра, ВР</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
                <a href="/katalog/szr/gerbisan-se" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/szr/gerbisan-se.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Гербисан, СЭ</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
                <a href="/katalog/szr/betrisan-ke" class="catalog__product product-card">
                    <div class="product-card__img">
                        <img src="/img/katalog/szr/bretiskan-big__jpg.jpg" alt="">
                    </div>
                    <div class="product-card__content">
                        <h3 class="product-card__title">Бетрисан, КЭ</h3>
                        <div class="product-card__btns">
                            <span class="btn-outline">Подробнее </span>
                        </div>
                    </div>
                </a>
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