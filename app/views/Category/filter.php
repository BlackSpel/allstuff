<?php $curr = \core\app::$app->getProperty('currency'); ?>
<?php if(!empty($products)) : ?>
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
<?php else : ?>
  <h3>Category products not found</h3>
<?php endif; ?>