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
<?php
$curr = \core\app::$app->getProperty('currency');
$cats = \core\app::$app->getProperty('cats');
?>
<!--start-single-->
<div class="single contact">
  <div class="container">
    <div class="single-main">
      <div class="col-md-9 single-main-left">
        <div class="sngl-top">
          <div class="col-md-5 single-top-left">
            <div class="flexslider">
              <ul class="slides">
                <?php if($gallery) : ?>
                  <?php foreach($gallery as $item) : ?>
                    <li data-thumb="/images/<?= $item->img ?>">
                      <div class="thumb-image"> <img src="/images/<?= $item->img ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                    </li>
                  <?php endforeach; ?>
                <?php else : ?>
                <li data-thumb="/images/s-no-image.png">
                  <div class="thumb-image"> <img src="/images/s-no-image.png" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                </li>
                <li data-thumb="/images/s-no-image.png">
                  <div class="thumb-image"> <img src="/images/s-no-image.png" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                </li>
                <li data-thumb="/images/s-no-image.png">
                  <div class="thumb-image"> <img src="/images/s-no-image.png" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                </li>
                <?php endif ?>
              </ul>
            </div>
          </div>
          <div class="col-md-7 single-right">
            <div class="single-para simpleCart_shelfItem">
              <h2 class="single-title"><?= $product->title; ?></h2>
              <h5 class="item_price" id="base-price" data-base="<?= $product->price * $curr['value'] ?>">Price : <?= $curr['symbol_left'] . ' ' . $product->price * $curr['value'] ?>
                <?php if($product->old_price) : ?>
                  <small><del><?= $product->old_price * $curr['value'] ?></del></small>
                <?php endif ?>
              </h5>
              <div class="available">
                <ul>
                  <?php if($mods) : ?>
                  <li>
                    <div class="color-single">Color: </div>
                    <select class="image-picker">
                      <?php foreach($mods as $mod) : ?>
                        <option data-img-src="/images/<?= $mod->img ?>" data-title="<?= $mod->title ?>" data-price="<?= $mod->price * $curr['value']; ?>" value="<?= $mod->id ?>" ><?= $mod->title ?></option>
                      <?php endforeach; ?>
                    </select>
                  </li>
                  <?php endif; ?>
                  <div class="l-text-single">Quantity:</div>
                    <!--<input type="number" size="4" value="1" name="quantity" min="1" step="1" max="10">-->
                  <div class="text-single">
                    <div class="quantity">
                      <input type="button" value="-" onClick="change('amount',1,10,-1);" class="qty_inp"/>
                      <input id="amount" type="text" value="1" class="count-single" size="15%" readonly/>
                      <input type="button" value="+" onClick="change('amount',1,10, 1);" class="qty_inp"/>
                    </div>
                  </div>
                  </li>
                  <li><div class="l-text-single">Shipping:</div><div class="r-text-single">FREE Standard Shipping | (FedEx, UPS)<br/><small class="small-1">Item location: USA, United States<br/>Ships to: United States and many other countries | <a href="#item2">See details</a></small></div>
                  </li>
                  <li><div class="l-text-single">Delivery:</div><div class="r-text-single">Guaranteed delivery to <span class="text-success"><?= date("D. M. d", time()+3600*24*30) ?></span></div>
                  </li>
                  <div class="clearfix"> </div>
                </ul>
              </div>
              <hr class="single-hr"/>
              <a id="productAdd" href="/cart/add?id=<?= $product->id ?>" class="add-cart item_add add-to-cart-link" data-id="<?= $product->id ?>">BUY NOW</a>
              <h4 class="single-total-price">Total price: <?= $curr['symbol_left'] ?></h4><h4 class="single-total-price" id="total-price"><?= $product->price * $curr['value'] ?></h4>
              <hr/>
              <div class="l-text-single">Seller Guarantees:</div><div class="r-text-single">On-time Delivery 30 days</div>
              <div class="l-text-single">Payment:</div><div class="r-text-single">PayPal, MasterCard, Visa</div>
              <div class="l-text-single">Category:</div><div class="r-text-single"><a href="/category/<?= $cats[$product->category_id]['alias'] ?>"> <?= $cats[$product->category_id]['title'] ?></a></div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <h3>Product specifications</h3>
        <?= html_entity_decode($product->product_specifications); ?>
        <div class="tabs">
          <ul class="menu_drop">
            <li class="item2" id="item2"><a href="#"><img src="/images/arrow.png" alt="">Details</a>
              <ul>
                <li class="subitem1">
                  <?= html_entity_decode($product->content); ?>
                </li>
              </ul>
            </li>
            <li class="item3" id="item3"><a href="#"><img src="/images/arrow.png" alt="">Delivery</a>
              <ul>
                <li class="subitem1">
                  <p><strong>Shipping and handling</strong></p>
                  <p>Item location: Brooklyn, New York, United States.</p>
                  <p>Shipping to: United States, Canada, United Kingdom, Denmark, Romania, Slovakia, Bulgaria, Czech Republic, Finland, Hungary, Latvia, Lithuania, Malta, Estonia, Australia, Greece, Portugal, Cyprus, Slovenia, Japan, Sweden, Korea, South, Indonesia, Taiwan, South Africa, Thailand, Belgium, Hong Kong, Ireland, Netherlands, Poland, Spain, Italy, Germany, Austria, Israel, Mexico, New Zealand, Philippines, Singapore, Norway, Ukraine, United Arab Emirates, Qatar, Kuwait, Bahrain, Croatia, Republic of, Malaysia, Brazil, Chile, Colombia, Costa Rica, Panama, Trinidad and Tobago, Guatemala, El Salvador, Honduras, Jamaica, Antigua and Barbuda, Aruba, Belize, Dominica, Grenada, Saint Kitts-Nevis, Saint Lucia, Montserrat, Turks and Caicos Islands, Barbados, Bangladesh, Bermuda, Brunei Darussalam, Bolivia, Ecuador, Egypt, French Guiana, Guernsey, Gibraltar, Guadeloupe, Iceland, Jersey, Jordan, Cambodia, Cayman Islands, Liechtenstein, Sri Lanka, Luxembourg, Monaco, Macau, Martinique, Maldives, Nicaragua, Oman, Peru, Pakistan, Paraguay, Reunion</p>
                  <p>Shipping and handling: Free shipping</p>
                  <p>Each additional item: Free</p>
                  <p>To: United States</p>
                  <p>Service: Standard Shipping (FedEx/UPS)</p>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <?php if ($related) : ?>
        <div class="latestproducts">
          <div class="product-one">
            <h3>More Products:</h3>
            <?php foreach ($related as $item) : ?>
              <div class="col-md-4 product-left p-left">
                <div class="product-main simpleCart_shelfItem">
                  <a href="<?= $item['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="/images/<?= $item['img'] ?>" alt="" /></a>
                  <div class="product-bottom">
                    <h3><a href="<?= $item['alias'] ?>"><?= $item['title'] ?></a></h3>
                    <h4><span class=" item_price"><?= $curr['symbol_left'] . ' ' . $item['price'] * $curr['value'] ?></span>
                    <?php if($item['old_price']) : ?>
                      <small><del><?= $item['old_price'] * $curr['value'] ?></del></small>
                    <?php endif ?>
                    </h4>
                  </div>
                  <?php if($item['old_price']) : ?>
                    <div class="srch">
                      <span><?= substr((($item['old_price'] - $item['price']) / ($item['old_price'] * 0.01)), 0, 4) . ' %' ?></span>
                    </div>
                  <?php endif ?>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
          </div>
        </div>
        <?php endif ?>
        <?php if ($recentlyViewed) : ?>
          <div class="latestproducts">
            <div class="product-one">
              <h3>Recently Viewed:</h3>
              <?php foreach ($recentlyViewed as $item) : ?>
                <div class="col-md-4 product-left p-left">
                  <div class="product-main simpleCart_shelfItem">
                    <a href="<?= $item['alias'] ?>" class="mask"><img class="img-responsive zoom-img" src="/images/<?= $item['img'] ?>" alt="" /></a>
                    <div class="product-bottom">
                      <h3><a href="<?= $item['alias'] ?>"><?= $item['title'] ?></a></h3>
                      <h4><span class=" item_price"><?= $curr['symbol_left'] . ' ' . $item['price'] * $curr['value'] ?></span>
                        <?php if($item['old_price']) : ?>
                          <small><del><?= $item['old_price'] * $curr['value'] ?></del></small>
                        <?php endif ?>
                      </h4>
                    </div>
                    <?php if($item['old_price']) : ?>
                      <div class="srch">
                        <span><?= substr((($item['old_price'] - $item['price']) / ($item['old_price'] * 0.01)), 0, 4) . ' %' ?></span>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
              <?php endforeach; ?>
              <div class="clearfix"></div>
            </div>
          </div>
        <?php endif ?>
      </div>
      <div class="col-md-3 single-right">
        <?php if ($brand) : ?>
        <div class="w_sidebar">
          <section class="sky-form">
            <h4>Brand</h4>
            <ul class="w_nav2">
              <h2><?= $brand->title ?></h2>
              <p><img src="/images/<?= $brand->img ?>"></p>
              <p><?= $brand->description ?></p>
            </ul>
          </section>
        </div>
        <?php endif ?>
        <div class="w_sidebar">
          <section class="sky-form">
            <h4>Advertising</h4>
            <ul class="w_nav2">
              So far there's nothing here :)
            </ul>
          </section>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<!--end-single-->
