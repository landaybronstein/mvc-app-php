<?php

namespace Core;

class Authenticator
{
  public static function attempt($email, $password)
  {
    $user = App::resolve(Database::class)->query(
      "SELECT email, password FROM users WHERE email=:email",
      [
        "email" => $email
      ]
    )->find();

    if ($user && password_verify($password, $user["password"])) {
      static::login($user);
      return true;
    }

    return false;
  }

  public static function login($user)
  {
    $_SESSION["user"] = [
      "id" => $user["id"],
      "email" => $user["email"]
    ];

    session_regenerate_id(true);
  }

  public static function logout()
  {
    Session::destroy();
  }
  
  public static function authorize($condition, $status = Response::FORBIDDEN)
  {
    if (!$condition) {
      Router::abort($status);
    }
  }
}
