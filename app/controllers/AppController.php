<?php

namespace app\controllers;

use app\models\AppModel;
use app\widgets\currency\currency;
use core\app;
use core\base\controller;
use core\cache;
use RedBeanPHP\R;

class AppController extends controller
{
  public function __construct($route)
  {
    parent::__construct($route);
    new AppModel();
    app::$app->setProperty('currencies', currency::getCurrencies());
    app::$app->setProperty('currency', currency::getCurrency(app::$app->getProperty('currencies')));
    app::$app->setProperty('cats', self::cacheCategory());
  }

  public static function cacheCategory()
  {
    $cache = cache::instance();
    $cats = $cache->get('cats');
    if(!$cats)
    {
      $cats = R::getAssoc("SELECT * FROM category");
      $cache->set('cats', $cats);
    }
    return $cats;
  }
}