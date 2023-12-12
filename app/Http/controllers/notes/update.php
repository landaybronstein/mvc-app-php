<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Router;

$db = App::resolve(Database::class);
$id = htmlspecialchars($_POST["id"]) ?? "";
$body = htmlspecialchars($_POST["body"]) ?? "";
$currentUserId = 2;
$errors = [];

$note = $db->query(
  "SELECT * FROM notes WHERE id=:id;",
  ["id" => $id]
)->findOrFail();

authorize($note["user_id"] === $currentUserId);

if (!Validator::string($body, 1, 1000)) {
  $errors["body"] = "A body of no more than 1,000 characters is required";
}

if (!empty($errors)) {
  return view("/notes/edit.view.php", [
    "heading" => "Edit a note",
    "note" => $note,
    "errors" => $errors
  ]);
}

$db->query("UPDATE notes SET body=:body WHERE id=:id", [
  "body" => $body,
  "id" => $id
]);

Router::redirect("/notes");
