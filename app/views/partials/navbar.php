<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav align-items-center">
        <a class="nav-link <?= urlIs("/") ? "active" : "" ?>" href="/">Home</a>
        <a class="nav-link <?= urlIs("/about") ? "active" : "" ?>" href="/about">About</a>
        <a class="nav-link <?= urlIs("/contact") ? "active" : "" ?>" href="/contact">Contact</a>
        <?php if ($_SESSION["user"] ?? false) : ?>
          <a class="nav-link <?= urlIs("/notes") ? "active" : "" ?>" href="/notes">Notes</a>
          <form method="post" action="/session">
            <input type="hidden" name="_method" value="DELETE" />
            <button class="nav-link">Log out</button>
          </form>
        <?php else : ?>
          <a class="nav-link <?= urlIs("/login") ? "active" : "" ?>" href="/login">Login</a>
          <a class="nav-link <?= urlIs("/register") ? "active" : "" ?>" href="/register">Register</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>