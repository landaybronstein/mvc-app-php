<?php

use Core\App;

$db = App::resolve("Core\Database");

$heading = "Notes";
$notes = $db->query("SELECT * FROM notes;")->get();

view("/notes/index.view.php", [
  "heading" => $heading,
  "notes" => $notes
]);
