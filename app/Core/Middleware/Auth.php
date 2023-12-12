<?php

namespace Core\Middleware;

use Core\Router;

class Auth
{
  public static function handle()
  {
    if(!$_SESSION["user"] ?? false) {
      Router::redirect("/");
    }
  }
}