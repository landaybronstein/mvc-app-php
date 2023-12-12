<?php

use Core\Router;
use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = trim(htmlspecialchars($_POST["email"]));
$password = trim(htmlspecialchars($_POST["password"]));

$form = LoginForm::validate([
  "email" => $email,
  "password" => $password
]);

if ((new Authenticator)->attempt($email, $password)) {
  Router::redirect("/");
}

$form->error("email", "No matching account found for that email address and password!");

Session::flash("errors", $form->errors());

return Router::redirect("/login");
