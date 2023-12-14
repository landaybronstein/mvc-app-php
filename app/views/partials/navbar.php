<?php

use Core\Router;

?>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav align-items-center">
        <a class="nav-link <?= Router::urlIs("/") ? "active" : "" ?>" href="/">Home</a>
        <a class="nav-link <?= Router::urlIs("/about") ? "active" : "" ?>" href="/about">About</a>
        <a class="nav-link <?= Router::urlIs("/contact") ? "active" : "" ?>" href="/contact">Contact</a>
      </div>
    </div>
  </div>
</nav>