<?php

$heading = "Home";
$user = $_SESSION["user"] ?? null;

view("index.view.php", [
  "heading" => $heading,
  "user" => $user
]);
