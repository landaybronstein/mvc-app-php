<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/navbar.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main class="container">
  <form method="POST" action="/note" class="m-4 p-4 card">
    <input type="hidden" name="_method" value="PATCH" />
    <input type="hidden" name="id" value="<?= $note["id"] ?>" />
    <label class="form-label" for="body">Body</label>
    <textarea class="form-control" name="body" id="body" placeholder="Enter Body">
      <?= $note["body"] ?>
    </textarea>
    <div class="d-grid my-3 gap-2">
      <a class="btn btn-outline-primary" href="/notes">Cancel</a>
      <button type="submit" class="btn btn-outline-dark">
        Update
      </button>
    </div>
    <?php if (isset($errors["body"])) : ?>
      <p class="alert alert-danger" role="alert"><?= $errors["body"] ?></p>
    <?php endif; ?>
  </form>
</main>

<?php require base_path("views/partials/footer.php") ?>