<?php $curr = \core\app::$app->getProperty('currency'); ?>
<?php $cats = \core\app::$app->getProperty('cats') ?>
<!--start-breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-main">
      <ol class="breadcrumb">
        <?= $breadcrumbs ?>
      </ol>
    </div>
  </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
  <div class="container">
    <div class="prdt-top">
      <div class="col-md-3 prdt-right">
        <div class="w_sidebar">
          <section class="sky-form">
            <h4>Filters:</h4>
          </section>
          <?php new \app\widgets\filter\filter(); ?>
        </div>
      </div>
      <div class="col-md-9 prdt-left">
        <?php if(!empty($products)) : ?>
        <div class="product-one">
            <?php foreach($products as $product) : ?>
              <div class="col-md-4 product-left p-left">
                <div class="product-main simpleCart_shelfItem">
                  <a href="/product/<?= $product['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="/images/<?= $product['img'] ?>" alt="" /></a>
                  <div class="product-bottom">
                    <h3><a href="/product/<?= $product['alias'] ?>"><?= $product['title'] ?></a></h3>
                    <h4><a class="add-to-cart-link" href="cart/add?id=<?= $product['id'] ?>" data-id="<?= $product['id'] ?>"><i></i></a> <span class=" item_price"><?= $curr['symbol_left'] . ' ' . $product['price'] * $curr['value'] ?></span>
                      <?php if($product['old_price']) : ?>
                        <small><del><?= $product['old_price'] * $curr['value'] ?></del></small>
                      <?php endif ?>
                    </h4>
                  </div>
                  <?php if($product['old_price']) : ?>
                    <div class="srch">
                      <span><?= substr((($product['old_price'] - $product['price']) / ($product['old_price'] * 0.01)), 0, 4) . ' %' ?></span>
                    </div>
                  <?php endif ?>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
            <?php if($pagination->countPages > 1) : ?>
              <div class="text-center">
                <p>(<?= count($products) ?> out of <?= $total ?>)</p>
                <?= $pagination; ?>
              </div>
            <?php endif ?>
          </div>
        <?php else : ?>
        <h3>There are no products in this category.</h3>
        <?php endif; ?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--product-end-->