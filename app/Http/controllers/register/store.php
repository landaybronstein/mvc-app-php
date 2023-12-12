<?php

use Core\Router;
use Core\Validator;
use Core\App;

$db = App::resolve("Core\Database");
$errors = [];
$email = trim(htmlspecialchars($_POST["email"]));
$password = trim(htmlspecialchars($_POST["password"]));

if (!Validator::email($email)) {
  $errors["email"] = "Email is not valid!";
}

if (!Validator::string($password, 7, 255)) {
  $errors["password"] = "Password must be 8 length at least";
}

if (!empty($errors)) {
  return view("/register/create.view.php", [
    "heading" => "Registration",
    "errors" => $errors
  ]);
}

$user = $db->query("SELECT email FROM users WHERE email=:email", [
  "email" => $email
])->find();

if ($user) {
  Router::redirect("/login");
}

$db->query("INSERT INTO users(email, password) VALUES(:email, :password);", [
  "email" => $email,
  "password" => password_hash($password, PASSWORD_BCRYPT)
]);

login([
  "email" => $email
]);
Router::redirect("/");
