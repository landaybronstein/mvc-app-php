<?php

use Core\Response;
use Core\Router;

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
}

function urlIs($value)
{
  return ($_SERVER["REQUEST_URI"] === $value);
}

function authorize($condition, $status = Response::FORBIDDEN)
{
  if (!$condition) {
    Router::abort($status);
  }
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function view($name, $attributes = [])
{
  extract($attributes);
  require BASE_PATH . "/views/" . $name;
}