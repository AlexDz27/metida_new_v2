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
    <div class="product">
        <div class="product__image">
            <img src="/img/katalog/udobreniya/mono.jpg" alt="">
        </div>
        <div class="product__content">
            <h1 class="product__title">
                Монокалийфосфат (МКФ)
            </h1>
            <div class="product__desc">
                <h3>НАЗНАЧЕНИЕ</h3>
                <p>Монокалийфосфат является высококонцентрированным по фосфору водорастворимым фосфорно-калийным удобрением. Используется как на защищенном, так и на открытом грунте в любые фенологические стадии развития растений, также для фолиарных обработок. Монокалийфосфат хорошо растворим в воде, быстро усваивается растениями, что позволяет использовать его для некорневых подкормок, а также для корневых подкормок через систему орошения. Особенно рекомендуется использовать для гидропоники, так как в его составе отсутствуют хлор и нерастворимые примеси. Раствор МКФ отлично подходит для обработки садово-огородных плодовых культур для продления периода цветения с дальнейшей стимуляцией интенсивного плодоношения. Также для декоративных культуры открытого грунта.</p>
                <p>Продукт изготовлен в соответствии с <b>ТУ 20.15.75-007-36196786-2019 «Монокалийфосфат»</b></p>
            </div>
            <div class="product__btns">
                <a href="javascript:void(0)" class="btn-green">Cпецификация</a>
                <a href="javascript:void(0)" class="btn-cta">Заказать</a>
            </div>
        </div> 
    </div>
    <div class="product-tabs">
        <div class="product-tabs__header">
            <div class="product-tabs__tab product-tabs__tab_active">
                Описание
            </div>
            <div class="product-tabs__tab">
                Упаковка и хранение
            </div>
            <div class="product-tabs__tab">
                Преимущества
            </div>
            <div class="product-tabs__tab">
                Фотогалерея
            </div>
        </div>
        <div class="product-tabs__body">
            <div class="product-tabs__content">
                <div class="product-table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Качественные характеристики</th>
                                <th>Нитрат кальция концентрированный</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Внешний вид</td>
                                <td>Белые прозрачные кристаллы</td>
                            </tr>
                            <tr>
                                <td>Массовая доля фосфора в пересчете на P<sub>2</sub>O<sub>5</sub>, %</td>
                                <td>52±1</td>
                            </tr>
                            <tr>
                                <td>Массовая доля калия в пересчете на K<sub>2</sub>O, %</td>
                                <td>34±1</td>
                            </tr>
                            <tr>
                                <td>Массовая доля воды, %, не более</td>
                                <td>0,3</td>
                            </tr>
                            <tr>
                                <td>Кислотность: показатель активности водородных ионов 1% раствора, ед. рН</td>
                                <td>4,6±0,2</td>
                            </tr>
                            <tr>
                                <td>Рассыпчатость, %, не менее</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="product-tabs__content" style="display: none;">
            <div class="product-description">
                    <div class="product-description__item">
                        <p>
                            Продукт упакован в соответствии с действующей нормативной документацией предприятия изготовителя.
                        </p>
                    </div>
                    <div class="product-description__item">
                        <p>
                            Фасовка продукта по согласованию с потребителем: мешки до 10 кг; 22,7 кг; 25 кг; МКР 950 кг; 1000 кг; 1200 кг; 1250 кг.
                        </p>
                    </div>
                    <div class="product-description__item">
                        <p>
                            Хранить в крытых складских помещениях, исключающих попадание атмосферных осадков и влаги.
                        </p>
                    </div>
                    <div class="product-description__item">
                        <p>
                            Гарантийный срок хранения и срок годности согласно <b>ТУ 20.15.75-007-36196786-2019 «Монокалийфосфат»</b>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="product-tabs__content" style="display: none;">
                <div class="product-text">
                    <p><b>Хранить в сухом изолированном помещении, исключающем попадание влаги и прямых солнечных лучей.</b></p>
                    <ul>
                        <li>МКР по 1000 кг</li>
                        <li>МКР по 500 кг</li>
                        <li>Полиэтиленовые мешки по 25 кг</li>
                    </ul>
                </div>
            </div>
            <div class="product-tabs__content" style="display: none;">
                <div class="product-gallery">
                    <div>
                        <img src="/img/katalog/udobreniya/mono-gallery/mono-1.jpg" alt="">
                    </div>
                    <div>
                        <img src="/img/katalog/udobreniya/mono-gallery/mono-2.jpg" alt="">
                    </div>
                    <div>
                        <img src="/img/katalog/udobreniya/mono-gallery/mono-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require "views/parts/nowBuyingSection.php" ?>