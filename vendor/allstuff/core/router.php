<?php

namespace core;

class router
{
  public static $routes = [];
  public static $route = [];

  public static function add($regexp, $route = [])
  {
    self::$routes[$regexp] = $route;
  }

  public static function getRoutes()
  {
    return self::$routes;
  }

  public static function getRoute()
  {
    return self::$route;
  }

  public static function dispatch($url)
  {
    $url = self::removeQueryString($url);
    if(self::matchRoute($url))
    {
      $conroller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
      if(class_exists($conroller))
      {
        $controllerObject = new $conroller(self::$route);
        $action = self::lowerCamelCase(self::$route['action']) . 'Action';
        if(method_exists($controllerObject, $action))
        {
          $controllerObject->$action();
          $controllerObject->getView();
        }
        else
        {
          throw new \Exception("Метод $conroller::$action не найден", 404);
        }
      }
      else
      {
        throw new \Exception("Контроллер $conroller не найден", 404);
      }
    }
    else
    {
      throw new \Exception('Страница не найдена', 404);
    }
  }

  public static function matchRoute($url)
  {
    foreach (self::$routes as $pattern => $route)
    {
      if(preg_match("#{$pattern}#i", $url, $matches))
      {
        foreach($matches as $k => $v)
        {
          if(is_string($k))
          {
            $route[$k] = $v;
          }
        }
        if(empty($route['action']))
        {
          $route['action'] = 'index';
        }
        if(!isset($route['prefix']))
        {
          $route['prefix'] = '';
        }
        else
        {
          $route['prefix'] .= '\\';
        }
        $route['controller'] = self::upperCamelCase($route['controller']);
        self::$route = $route;
        return true;
      }
    }
    return false;
  }

  protected static function upperCamelCase($name)
  {
    return str_replace(' ', '', ucwords(str_replace('-', ' ' , $name)));
  }

  protected static function lowerCamelCase($name)
  {
    return lcfirst(self::upperCamelCase($name));
  }

  protected static function removeQueryString($url)
  {
    if($url)
    {
      $params = explode('&', $url, 2);
      if(strpos($params[0], '=') === false)
      {
        return rtrim($params[0], '/');
      }
      else
      {
        return '';
      }
    }
  }
}