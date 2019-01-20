<?php

namespace core;

class app
{
  public static $app;

  public function __construct()
  {
    $query = trim($_SERVER['QUERY_STRING'], '/');
    session_start();
    self::$app = registry::instance();
    $this->getParams();
    new errorHandler;
    router::dispatch($query);
  }

  protected function getParams()
  {
    $params = require_once CONF . '/params.php';
    if(!empty($params))
    {
      foreach($params as $k => $v)
      {
        self::$app->setProperty($k, $v);
      }
    }
  }
}