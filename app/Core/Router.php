<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
  protected $routes = [];

  private function add($uri, $method, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'method' => $method,
      'controller' => $controller,
      'middleware' => null
    ];
  }

  public function get($uri, $controller)
  {
    $this->add($uri, "GET", $controller);
    return $this;
  }

  public function post($uri, $controller)
  {
    $this->add($uri, "POST", $controller);
    return $this;
  }

  public function delete($uri, $controller)
  {
    $this->add($uri, "DELETE", $controller);
    return $this;
  }

  public function put($uri, $controller)
  {
    $this->add($uri, "PUT", $controller);
    return $this;
  }

  public function patch($uri, $controller)
  {
    $this->add($uri, "PATCH", $controller);
    return $this;
  }

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
        Middleware::resolve($route["middleware"]);
        return require App::base_path("Http/controllers/" . $route["controller"]);
      }
    }

    static::abort();
  }

  public function middleware($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    return $this;
  }

  public static function abort($statusCode = Response::NOT_FOUND)
  {
    require App::base_path("views/{$statusCode}.view.php");
    exit();
  }

  public static function redirect($route = "/")
  {
    header("location: {$route}");
    exit();
  }

  public static function previous()
  {
    static::redirect($_SERVER["HTTP_REFERER"]);
  }

  public static function urlIs($value)
  {
    return ($_SERVER["REQUEST_URI"] === $value);
  }
}
