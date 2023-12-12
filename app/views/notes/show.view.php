<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/navbar.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main class="container">
  <div class="d-flex justify-content-center">
    <div class="card my-4" style="max-width: 45rem;">
      <div class="card-header lead">
        Note
      </div>
      <p class="card-text display-6 p-3">
        <?= $note["body"]; ?>
      </p>
      <div class="card-footer">
        <a href="/note/edit?id=<?= $note["id"] ?>" style="width: 100%;" class="btn btn-outline-warning">
          Edit
        </a>
        <form method="POST" action="/note">
          <input type="hidden" name="_method" value="DELETE" />
          <input type="hidden" name="id" value="<?= $note["id"] ?>" />
          <button type="submit" style="width: 100%;" class="btn btn-outline-danger">
            Delete
          </button>
        </form>
      </div>
    </div>
  </div>
</main>

<?php require base_path("views/partials/footer.php") ?>