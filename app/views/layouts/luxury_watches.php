<!DOCTYPE html>
<html>
<head>
  <?= $this->getMeta() ?>
  <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/megamenu/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/megamenu/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/css/flexslider.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="/image-picker-master/image-picker/image-picker.css" rel="stylesheet" />
  <!--theme-style-->
  <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!--//theme-style-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<!--top-header-->
<div class="top-header">
  <div class="container">
    <div class="top-header-main">
      <div class="col-md-6 col-sm-4 col-sx-4 top-header-left">
        <div class="drop">
          <div class="btn-group">
              <?php new \app\widgets\currency\currency(); ?>
          </div>
          <div class="btn-group">
            <a class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php if(!empty($_SESSION['user'])) : ?>
                <li><a>Welcome, <?= h($_SESSION['user']['firstname']) ?></a></li>
                <li><a href="/user/orders">My orders</a></li>
                <li><a href="/user/logout">Log out</a></li>
              <?php else : ?>
                <li><a href="/user/login">Login</a></li>
                <li><a href="/user/signup">Register</a></li>
              <?php endif ?>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="col-md-6 top-header-left">
        <div class="cart box_1">
          <a href="cart/show" onclick="getCart(); return false;">
            <div class="total">
              <img src="/images/cart-1.png" alt="" />
              <?php if(!empty($_SESSION['cart'])) : ?>
                <span class="simpleCart_total"><?= $_SESSION['cart.currency']['symbol_left'] . ' ' . $_SESSION['cart.sum'] ?></span>
              <?php else : ?>
                <span class="simpleCart_total">Empty Cart</span>
              <?php endif; ?>
            </div>
          </a>
        </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
  <a href="/"><h1>ALL Stuff</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
  <div class="container">
    <div class="header">
      <div class="col-md-9 header-left">
        <div class="menu-container">
          <div class="menu">
            <?php new \app\widgets\menu\menu([ 'tpl' => WWW . '/menu/menu.php' ]) ?>
          </div>
        </div>

        <div class="clearfix"> </div>
      </div>
      <div class="col-md-3 header-right">
        <div class="search-bar">
          <form action="/search" method="get" autocomplete="off">
            <input type="text" class="typeahead" id="typeahead" name="s">
            <input type="submit" value="">
          </form>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<!--bottom-header-->
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if(isset($_SESSION['error'])) : ?>
          <div class="alert alert-danger">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
          </div>
        <?php endif ?>
        <?php if(isset($_SESSION['success'])) : ?>
          <div class="alert alert-success">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
  <?= $content ?>
</div>

<!--information-starts-->
<div class="information">
  <div class="container">
    <div class="infor-top">
      <div class="col-md-3 infor-left">
        <h3>Get started</h3>
        <ul>
          <li><a href="/"><h6>Home</h6></a></li>
          <li><a href="/#"><h6>Sign up</h6></a></li>
        </ul>
      </div>
      <div class="col-md-3 infor-left">
        <h3>Information</h3>
        <ul>
          <li><a href="/#"><p>Company information</p></a></li>
          <li><a href="/contact.html"><p>Contact Us</p></a></li>
        </ul>
      </div>
      <div class="col-md-3 infor-left">
        <h3>My Account</h3>
        <ul>
          <li><a href="/account.html"><p>My Account</p></a></li>
          <li><a href="/#"><p>My Order</p></a></li>
        </ul>
      </div>
      <div class="col-md-3 infor-left">
        <h3>Store Information</h3>
        <h4>The company name, <span>ALLStaff,</span>
        <p><a href="/mailto:example@email.com">contact@example.com</a></p>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
  <div class="container">
    <div class="footer-top">
      <div class="col-md-5 footer-left">
        <form>
          <input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
          <input type="submit" value="Subscribe">
        </form>
      </div>
      <div class="col-md-2 footer-right">
        <p>© 2018 <a href="<?= PATH ?>" target="_blank">ALLStaff</a></p>
      </div>
      <div class="col-md-5 footer-right">
        <p>© 2015 Luxury Watches. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--footer-end-->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cart</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Continue shopping</button>
        <a href="/cart/view" type="button" class="btn btn-primary">Checkout</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Clear cart</button>
      </div>
    </div>
  </div>
</div>

<div class="preloader">
  <img src="/images/ring.svg">
</div>

<!--script-start-->
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.easydropdown.js"></script>
<script src="/js/validator.js"></script>
<script src="/js/typeahead.bundle.js"></script>
<script type="text/javascript">
    $(function() {

        var menu_ul = $('.menu_drop > li > ul'),
            menu_a  = $('.menu_drop > li > a');

        menu_ul.hide();

        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });

    });
</script>
<script src="/js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<script>
    var path = '<?=PATH;?>';
</script>
<script src="/megamenu/js/megamenu.js"></script>
<script src="/js/imagezoom.js"></script>
<script defer src="/js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<script src="/js/main.js"></script>
<script>
    function change(objName, min, max, step) {
        var obj = document.getElementById(objName);
        var tmp = +obj.value + step;
        if (tmp<min) tmp=min;
        if (tmp>max) tmp=max;
        obj.value = tmp;
    }
</script>
<script src="/image-picker-master/image-picker/image-picker.min.js"></script>
<script>
    $("select.image-picker").imagepicker();
</script>
<!--script-end-->
<? // Дебаг php red bean
use RedBeanPHP\R;
$logs = R::getDatabaseAdapter()
  ->getDatabase()
  ->getLogger();

debug( $logs->grep( 'SELECT' ) );
?>
</body>
</html>