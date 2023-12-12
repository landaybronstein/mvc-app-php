<?php

use Core\App;
use Core\Router;

$db = App::resolve("Core\Database");

$currentUserId = 2;

$id = $_POST["id"];

$note = $db->query(
  "SELECT * FROM notes WHERE id=:id;",
  ["id" => $id]
)->findOrFail();

authorize($note["user_id"] === $currentUserId);

$db->query("DELETE FROM notes WHERE id=?", [$id]);

Router::redirect("/notes");
