<?php

session_start();
const BASE_PATH = __DIR__."/../";
require BASE_PATH . "/vendor/autoload.php";

use Core\App;
use Core\Router;
use Core\Session;
use Core\ValidationException;

require App::base_path("bootstrap.php");

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
$router = new Router();

$router->get("/", "index.php");
$router->get("/contact", "contact.php");
$router->get("/about", "about.php");

try {
  $router->route($uri, $method);
} catch (ValidationException $exception) {
  Session::flash("errors", $exception->errors);
  return Router::previous();
}

Session::unflash();