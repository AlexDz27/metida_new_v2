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
    
</div>