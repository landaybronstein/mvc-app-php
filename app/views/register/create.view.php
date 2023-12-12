<?php require base_path("views/partials/header.php") ?>
<?php require base_path("views/partials/navbar.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main class="container">
  <form class="m-4 p-4" action="/register" method="POST">
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
    </div>
    <?php if (isset($errors["email"])) : ?>
      <small class="form-text text-danger m-2"><?= $errors["email"] ?></small>
    <?php endif; ?>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    <?php if (isset($errors["password"])) : ?>
      <small class="form-text text-danger m-2"><?= $errors["password"] ?></small>
    <?php endif; ?>
    <div class="d-grid my-4">
      <button type="submit" class="btn btn-outline-dark">Register</button>
    </div>

  </form>
</main>


<?php require base_path("views/partials/footer.php") ?>