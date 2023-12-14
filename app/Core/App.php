<?php

namespace Core;

class App
{
  protected static $container;

  public static function setContainer($container)
  {
    static::$container = $container;
  }

  public static function getContainer()
  {
    return static::$container;
  }

  public static function resolve($key)
  {
    return static::$container->resolve($key);
  }
  
  public static function dd($value)
  {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
  }

  public static function base_path($path)
  {
    return BASE_PATH . $path;
  }

  public static function view($name, $attributes = [])
  {
    extract($attributes);
    require BASE_PATH . "/views/" . $name;
  }
}
