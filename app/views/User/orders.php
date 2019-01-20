<!--start-breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-main">
      <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">My orders</li>
      </ol>
    </div>
  </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
  <div class="container">
    <div class="prdt-top">
      <div class="col-md-12">
        <div class="product-one signup">
          <div class="register-top heading">
            <h2>My orders</h2>
          </div>
          <?php if(!empty($orders)) : ?>
            <div >
              <?php foreach ($orders as $order) : ?>
              <div style="border: 1px solid black">
              <div class="table-responsive" id="cart2">
                <table class="table table-hover table-striped">
                  <thead>
                  <tr>
                    <th>Order №</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Currency</th>
                    <th>Note</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['status'] ?></td>
                    <td><?= $order['date'] ?></td>
                    <td><?= $order['currency'] ?></td>
                    <td><?= $order['note'] ?>e</td>
                  </tr>
                  </tbody>
                </table>
              </div>
                <div class="table-responsive" id="cart2">
                  <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                      <th>Title</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($order_product[$order['id']] as $one_order_product) : ?>
                        <tr>
                          <td><?= $one_order_product['title'] ?></td>
                          <td><?= $one_order_product['qty'] ?> </td>
                          <td><?= $one_order_product['price'] ?></td>
                          <td>Total price</td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <h3>Orders is empty.</h3>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--product-end-->