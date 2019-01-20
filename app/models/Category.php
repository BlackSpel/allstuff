<?php

namespace app\models;

use core\app;

class Category extends AppModel
{
  public static function getIds($id)
  {
    $cats = app::$app->getProperty('cats');
    $ids = null;
    foreach ($cats as $k => $v)
    {
      if($v['parent_id'] == $id)
      {
        $ids .= $k . ',';
        $ids .= Category::getIds($k);
      }
    }
    return $ids;
  }
}