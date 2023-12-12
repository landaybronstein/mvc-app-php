<?php

use Core\Router;
use Core\Validator;
use Core\App;

$db = App::resolve("Core\Database");
$errors = [];
$body = trim(htmlspecialchars($_POST["body"]));

if (!Validator::string($body, 1, 1000)) {
  $errors["body"] = "A body of no more than 1,000 characters is required";
}

if (!empty($errors)) {
  return view("/notes/create.view.php", [
    "heading" => $heading,
    "errors" => $errors
  ]);
}

$db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id);", [
  "body" => $body,
  "user_id" => 2
]);

Router::redirect("/notes");