<?php

namespace core;

class cache
{
  use TSingleton;

  public function set($key, $data, $seconds = 3600)
  {
    if($seconds)
    {
      $content['data'] = $data;
      $content['end_time'] = time() + $seconds;
      if(file_put_contents(CACHE . "/" . md5($key) . ".txt", serialize($content)))
      {
        return true;
      }
    }
  }

    public function get($key)
  {
    $file = CACHE . "/" . md5($key) . ".txt";
    if(file_exists($file))
    {
      $content = unserialize(file_get_contents($file));
      if(time() <= $content['end_time'])
      {
        return $content['data'];
      }
      unlink($file);
    }
  }

    public function delete()
  {
    $file = CACHE . "/" . md5($key) . ".txt";
    if(file_exists($file))
    {
      unlink($file);
    }
  }
}