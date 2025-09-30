<?php include_once '../core/config.php' ?>
<?php include_once '../shared/head.php' ?>
<?php include_once '../shared/header.php' ?>
<?php include_once '../shared/asid.php' ?>
<?php include_once '../core/config.php' ?>
<?php include_once '../core/path.php' ?>
<?php
auth(3);
if (isset($_POST['submit'])) {
    $name = validate_input($_POST['name']);
    $email = validate_input($_POST['email']);
    $password = validate_input($_POST['password']);
    $userName = validate_input($_POST['username']);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username already exists
    $check_username = "SELECT * FROM users WHERE username = '$userName'";
    $result_username = mysqli_query($connect, $check_username);

    if (mysqli_num_rows($result_username) == 1) {
        $_SESSION['name'] = "Username already exists. Please choose a different one.";
    } else {
        $insert = "INSERT INTO `users` (name, email, password, username) VALUES ('$name', '$email', '$hash_password', '$userName')";
        $result = mysqli_query($connect, $insert);
        if ($result) {
            $_SESSION['create'] = "Account created successfully. Please login.";
        } else {
            $_SESSION['name'] = "An error occurred while creating the account. Please try again.";
        }
    }
}
?>
<main>
    <div class="container">

        <section class="section register mt-5 min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Admin</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>
                                <!-- Alert -->
                                <?php if (isset($_SESSION['name'])): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['name']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php unset($_SESSION['name']); ?>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['create'])): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['create']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php unset($_SESSION['create']); ?>
                                <?php endif; ?>

                                <form class="row g-3 needs-validation" novalidate method="post">
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="yourName" required>
                                        <div class="invalid-feedback">Please, enter a name!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="username" class="form-control" id="yourUsername" required>
                                            <div class="invalid-feedback">Please Enter a username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Please enter password!</div>
                                    </div>

                                    <!-- access admin -->
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="access_admin" type="checkbox" value="1" id="accessAdmin">
                                            <label class="form-check-label" for="accessAdmin">Make this user an admin</label>
                                        </div>
                                    </div>
                                    <!-- terms -->
                                    <div class="col-12">
                                        <p class="small">By clicking Create Admin, you agree to the <a href="#">Terms and Conditions</a>.</p>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" name="submit" type="submit">Create Admin</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</main>
<?php include_once '../shared/footer.php' ?>
<?php include_once '../shared/script.php' ?>