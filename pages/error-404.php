<?php include_once '../shared/head.php' ?>
<main>
  <div class="container">

    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <h1>404</h1>
      <h2>You do not have access to this page.</h2>
      <a class="btn" href="<?= URL("pages/login.php") ?>">Back to login</a>
      <img src="<?= URL("assets/img/not-found.svg") ?>" class="img-fluid py-5" alt="Page Not Found">
      <div class="credits">
        Designed by <a href="#">Abdullah</a>
      </div>
    </section>

  </div>
</main><!-- End #main -->

<?php include_once '../shared/script.php' ?>