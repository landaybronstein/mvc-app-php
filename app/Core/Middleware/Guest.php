<?php

namespace Core\Middleware;

use Core\Router;

class Guest
{
  public static function handle()
  {
    if($_SESSION["user"] ?? false) {
      Router::redirect("/");
    }
  }
}