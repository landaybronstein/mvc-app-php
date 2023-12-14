<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class Form 
{
  protected $errors = [];

  public function __construct(protected array $attributes) {}

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function throw()
  {
    ValidationException::throw($this->errors());
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
    return $this;
  }
}