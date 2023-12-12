<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
  protected $errors;
  protected $attributes;

  public function __construct($attributes)
  {
    $this->attributes = $attributes;

    if (!Validator::email($this->attributes["email"])) {
      $this->errors["email"] = "Email is not valid!";
    }

    if (!Validator::string($this->attributes["password"])) {
      $this->errors["password"] = "Password is not valid";
    }
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    if ($instance->failed()) {
      throw new ValidationException();
    }

    return $instance;
  }

  public function failed()
  {
    return count($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  }

  public function error($field, $message)
  {
    $this->errors[$field] = $message;
  }
}
