<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/navbar.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main class="container">
  <form method="POST" action="/notes" class="m-4 p-4 card">
    <label class="form-label" for="body">Body</label>
    <textarea class="form-control" name="body" id="body" placeholder="Enter Body">
    </textarea>
    <div class="d-grid my-3">
      <button type="submit" class="btn btn-outline-dark">
        Create
      </button>
    </div>
    <?php if (isset($errors["body"])) : ?>
      <p class="alert alert-danger" role="alert"><?= $errors["body"] ?></p>
    <?php endif; ?>
  </form>
</main>

<?php require base_path("views/partials/footer.php") ?>