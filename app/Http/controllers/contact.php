<?php 

use Core\App;

$heading = "Contacts";

App::view("contact.view.php", [
  "heading" => $heading
]);