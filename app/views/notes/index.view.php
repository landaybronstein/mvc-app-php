<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/navbar.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main class="container">
  <ol class="my-2 list-group list-group-numbered">
    <?php foreach ($notes as $note) : ?>
      <li class="list-group-item list-group-item-secondary">
        <a href="/note?id=<?=$note["id"]?>">
          <?= $note["body"] ?>
        </a>
      </li>
    <?php endforeach ?>
  </ol>
  <p class="d-grid mt-4">
    <a href="/notes/create" class="btn btn-outline-dark ">Create Note</a>
  </p>
</main>


<?php require base_path("views/partials/footer.php") ?>