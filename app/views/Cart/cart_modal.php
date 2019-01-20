<?php if(!empty($_SESSION['cart'])) : ?>
  <div class="table-responsive">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($_SESSION['cart'] as $id => $item) : ?>
        <tr>
          <th><a href="/product/<?= $item['alias'] ?>"><img src="/images/<?= $item['img'] ?>"></a></th>
          <th><a href="/product/<?= $item['alias'] ?>"><?= $item['title'] ?></a></th>
          <th><?= $item['qty'] ?></th>
          <th><?= $item['price'] ?></th>
          <th><span class="glyphicon glyphicon glyphicon-remove text-danger del-item" aria-hidden="true" data-id="<?= $id ?>"></span></th>
      <?php endforeach; ?>
      <tr>
        <td>Items:</td>
        <td colspan="4" class="text-right cart-qty"><?= $_SESSION['cart.qty'] ?></td>
      </tr>
      <tr>
        <td>Total price:</td>
        <td colspan="4" class="text-right cart-sum"><?= $_SESSION['cart.currency']['symbol_left'] . ' ' . $_SESSION['cart.sum'] ?></td>
      </tr>
      </tbody>
    </table>
  </div>
<?php else : ?>
  <h3>Cart is empty.</h3>
<?php endif; ?>
