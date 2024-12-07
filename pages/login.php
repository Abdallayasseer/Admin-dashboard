<?php include_once '../core/config.php' ?>
<?php include_once '../shared/head.php' ?>
<?php include_once '../core/path.php' ?>
<?php
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username = '$username'";
  $data = mysqli_query($connect, $query);

  if (mysqli_num_rows($data) == 1) {
    $row = mysqli_fetch_assoc($data);
    $database_password = $row['password'];
    $verify_password = password_verify($password, $database_password);

    if ($verify_password) {
      $_SESSION['admin'] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'email' => $row['email'],
        'rule_id' => $row['rule_id']
      ];
      admin_only();
    }

    $_SESSION['message'] = "wrong password";
  } else {
    $_SESSION['message'] = "User not found";
  }
}
?>
<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="../index.php" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">login</span>
              </a>
            </div><!-- End Logo -->
            <img src="" alt="">
            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <!-- Alert -->
                <?php if (isset($_SESSION['message'])): ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php unset($_SESSION['message']); ?>
                <?php endif; ?>

                <form class="row g-3 needs-validation" novalidate method="post">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="./register.php">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits">
              Designed by <a href="#">Abdullah</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->

<?php include_once '../shared/script.php' ?>