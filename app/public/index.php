<?php

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
  $class = str_replace("\\", "/", $class);
  require base_path("{$class}.php");
});

require base_path("bootstrap.php");

use Core\Router;
use Core\Session;

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
$router = new Router();

$router->get("/", "index.php");
$router->get("/contact", "contact.php");
$router->get("/about", "about.php");

$router->get("/notes", "notes/index.php")->only("auth");
$router->get("/notes/create", "notes/create.php");
$router->post("/notes", "notes/store.php");

$router->get("/note", "notes/show.php");
$router->get("/note/edit", "notes/edit.php");
$router->delete("/note", "notes/delete.php");
$router->patch("/note", "notes/update.php");

$router->get("/register", "register/create.php")->only("guest");
$router->post("/register", "register/store.php")->only("guest");

$router->get("/login", "session/create.php")->only("guest");
$router->post("/session", "session/store.php")->only("guest");
$router->delete("/session", "session/destroy.php")->only("auth");

$router->route($uri, $method);

Session::unflash();