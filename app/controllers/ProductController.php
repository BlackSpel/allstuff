<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Product;
use core\app;
use RedBeanPHP\R;

class ProductController extends AppController
{
  public function viewAction()
  {
    $alias = $this->route['alias'];
    $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);
    if(!$product)
    {
      throw new \Exception('Страница не найдена', 404);
    }
    $cats = app::$app->getProperty('cats');
    $this->setMeta("$product->title {$cats[$cats[$cats[$product->category_id]['parent_id']]['parent_id']]['title']} {$cats[$cats[$product->category_id]['parent_id']]['title']} watch | ALL Stuff", $product->description, $product->keywords);
    // Хлебнаые крошки
    $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);
    // Связанные товары
    $related = R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$product->id]);
    // Запись в куки запрошенного товара
    $p_model = new Product();
    $p_model->setRecentlyViewed($product->id);
    // Получить просмотренные товары
    $r_viewed = $p_model->getRecentlyViewed();
    $recentlyViewed = null;
    if($r_viewed)
    {
      $recentlyViewed = R::find('product', 'id IN (' . R::genSlots($r_viewed) . ') LIMIT 3', $r_viewed);
    }
    // Галерея
    $gallery = R::findAll('gallery', 'product_id = ?', [$product->id]);
    // Модификации
    $mods = R::findAll('modification', 'product_id = ?', [$product->id]);
    $brand = R::findOne('brand', 'id = ?', [$product['brand_id']]);
    $this->set(compact('product', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs', 'mods', 'brand'));
  }
}