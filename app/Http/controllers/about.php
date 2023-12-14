<?php 

use Core\App;

$heading = "About";

App::view("about.view.php", [
  "heading" => $heading
]);