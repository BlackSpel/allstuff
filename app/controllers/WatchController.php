<?php

namespace app\controllers;

use RedBeanPHP\R;

class WatchController extends AppController
{
  public function addAction()
  {
    if(!empty($_SESSION['user']))
    {
      $this->setMeta("Watch Add");
      $cats = R::findAll('category');
      $brand = R::findAll('brand');
      $attrs = R::findAll('attribute_value');
      $this->set(compact('cats', 'brand', 'attrs'));
    }
    else
    {
      redirect('/');
    }
  }

  public function addtoAction()
  {
    if($_SESSION['user'])
    {
      $cats = $_POST['cats'];
      $brand = $_POST['brand'];
      $title = $_POST['title'];
      $alias = $_POST['alias'];
      $content = htmlspecialchars($_POST['content'],ENT_QUOTES, 'UTF-8');
      $product_specifications = htmlspecialchars($_POST['product_specifications'],ENT_QUOTES, 'UTF-8');
      $price = $_POST['price'];
      if(!empty($_POST['old_price']))
      {
        $old_price = $_POST['old_price'];
      }
      else
      {
        $old_price = 0;
      }
      $keywords = $_POST['keywords'];
      $description = $_POST['description'];
      $attrs = $_POST['attrs'];
      $maxid_product =  R::getCell("SELECT max(id) FROM product");
      $maxid_product = $maxid_product + 1;
      debug ($maxid_product);
      move_uploaded_file($_FILES['img']['tmp_name'], WWW . "/images/p-{$maxid_product}.jpg");
      move_uploaded_file($_FILES['gallery1']['tmp_name'], WWW . "/images/s-{$maxid_product}-1.jpg");
      move_uploaded_file($_FILES['gallery2']['tmp_name'], WWW . "/images/s-{$maxid_product}-2.jpg");
      move_uploaded_file($_FILES['gallery3']['tmp_name'], WWW . "/images/s-{$maxid_product}-3.jpg");
      R::exec("INSERT INTO product (category_id, brand_id, title, alias, content, product_specifications, price, old_price, keywords, description, img) VALUE($cats, $brand, '$title', '$alias', '$content', '$product_specifications', $price, $old_price, '$keywords', '$description', 'p-{$maxid_product}.jpg')");
      R::exec("INSERT INTO gallery (product_id, img) VALUES ($maxid_product, 's-{$maxid_product}-1.jpg'),($maxid_product, 's-{$maxid_product}-2.jpg'),($maxid_product, 's-{$maxid_product}-3.jpg')");
      foreach ($attrs as $k => $v)
      {
        R::exec("INSERT INTO attribute_product (attr_id, product_id) VALUE ($v, $maxid_product)");
      }
      redirect('/');
    }
  redirect('/');
  }
}