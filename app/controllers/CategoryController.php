<?php

namespace app\controllers;

use app\widgets\filter\filter;
use RedBeanPHP\R;
use app\models\{Breadcrumbs, Category};
use core\{app, libs\pagination};

class CategoryController extends AppController
{
  public function viewAction()
  {
    $alias = $this->route['alias'];
    $category = R::findOne('category', 'alias = ?', [$alias]);
    if(!$category)
    {
      throw new \Exception('Страница не найдена', 404);
    }
    $ids = Category::getIds($category->id);
    $ids = !$ids ? $category->id : $ids . $category->id;

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $perpage = app::$app->getProperty('pagination');

    $sql_part = '';
    if(!empty($_GET['filter']))
    {
      $filter = filter::getFilter();
      if($filter)
      {
        $cnt = filter::getCountGroups($filter);
        // GROUP BY product_id HAVING COUNT(product_id) = $cnt
        $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter) GROUP BY product_id HAVING COUNT(product_id) = $cnt)";

      }

    }


    $total = R::count('product', "category_id IN ($ids) $sql_part");
    $pagination = new pagination($page, $perpage, $total);
    $start = $pagination->getStart();

    $products = R::find('product', "category_id IN ($ids) $sql_part LIMIT $start,$perpage");
    $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

    if($this->isAjax())
    {
      $this->loadView('filter', compact('products', 'total', 'pagination'));
    }

    $this->setMeta($category->title . ' Category of Watches', $category->description, $category->keywords);
    $this->set(compact('products', 'breadcrumbs', 'category', 'pagination', 'total'));
  }
}