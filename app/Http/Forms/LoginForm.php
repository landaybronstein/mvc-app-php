<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm extends Form
{
  protected $errors = [];

  public function __construct(protected array $attributes)
  {
    if (!Validator::email($this->attributes["email"])) {
      $this->errors["email"] = "Email is not valid!";
    }

    if (!Validator::string($this->attributes["password"])) {
      $this->errors["password"] = "Password is not valid";
    }
  }
}
