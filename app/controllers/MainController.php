<?php

namespace app\controllers;

use core\app;
use RedBeanPHP\R;

class MainController extends AppController
{
  public function indexAction()
  {
    $brands = R::find('brand', 'LIMIT 3');
    $hits = R::find('product', "hit = '1' AND status = '1' LIMIT 8");
    $this->setMeta(app::$app->getProperty('shop_name'), 'Главная страница онлайн магазина продажи часов', 'Онлайн магазин часов');
    $this->set(compact('brands', 'hits'));
  }
}