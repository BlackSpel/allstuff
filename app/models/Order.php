<?php

namespace app\models;

use core\app;
use RedBeanPHP\R;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Order extends AppModel
{
  public static function saveOrder($data)
  {
    if(!isset($_SESSION['cart.currency']))
    {
      $_SESSION['cart.currency'] = app::$app->getProperty('currency');
    }
    $order = R::dispense('order');
    $order->user_id = $data['user_id'];
    $order->note = $data['note'];
    $order->currency = $_SESSION['cart.currency']['code'];
    $order_id = R::store($order);
    self::saveOrderProduct($order_id);
    return $order_id;
  }
  public static function saveOrderProduct($order_id)
  {
    $sql_part = '';
    foreach($_SESSION['cart'] as $product_id => $product){
      $product_id = (int)$product_id;
      $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']}),";
    }
    $sql_part = rtrim($sql_part, ',');
    R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $sql_part");
  }

  public static function mailOrder($order_id, $user_email)
  {
    // Create the Transport
    $transport = (new Swift_SmtpTransport(app::$app->getProperty('smtp_host'), app::$app->getProperty('smtp_port'), app::$app->getProperty('smtp_protocol')))
      ->setUsername(app::$app->getProperty('smtp_login'))
      ->setPassword(app::$app->getProperty('smtp_password'))
    ;
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    ob_start();
    require APP . '/views/mail/mail_order.php';
    $body = ob_get_clean();

    $message_client = (new Swift_Message("You ordered №{$order_id} on site AllStuff"))
      ->setFrom([app::$app->getProperty('smtp_login') => 'AllStuff'])
      ->setTo($user_email)
      ->setBody($body, 'text/html')
    ;

    $message_admin = (new Swift_Message("Order made №{$order_id}"))
      ->setFrom([app::$app->getProperty('smtp_login') => 'AllStuff'])
      ->setTo(app::$app->getProperty('admin_email'))
      ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message_client);
    $result = $mailer->send($message_admin);
    unset($_SESSION['cart']);
    unset($_SESSION['cart.qty']);
    unset($_SESSION['cart.sum']);
    unset($_SESSION['cart.currency']);
    $_SESSION['success'] = 'Thank you for your order. In the near future you will be contacted by the manager for the coordination of the order';
  }
}