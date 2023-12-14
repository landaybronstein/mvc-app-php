<?php

use Core\App;

$heading = "Home";

App::view("index.view.php", [
  "heading" => $heading,
]);
