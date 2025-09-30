<!-- view.php -->
<?php include_once '../shared/head.php' ?>
<?php include_once '../shared/header.php' ?>
<?php include_once '../shared/asid.php' ?>
<?php include_once '../core/config.php' ?>
<?php include_once '../core/path.php' ?>
<?php
auth(3);

// Get user ID from URL parameter
$user_id = $_SESSION['admin']['id'];
$select = "SELECT * FROM users WHERE id = '$user_id'";

$result = mysqli_query($connect, $select);
$data = mysqli_fetch_assoc($result);
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= URL("") ?>">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-10">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <!-- User Data -->
                        <img src="<?= URL("assets/img/profile-img.jpg") ?>" alt="Profile" class="img-fluid mb-3">
                        <h2 class="text-center"><?= $data['name'] ?></h2>
                        <h3 class="text-center text-muted"><?= $data['email'] ?></h3>

                        <div class="profile-details mt-4 text-center">
                            <p><strong>Phone:</strong> <?= $data['Phone'] ?></p>
                            <p><strong>Company:</strong> <?= $data['Company'] ?></p>
                            <p><strong>Address:</strong> <?= $data['Address'] ?></p>
                        </div>

                        <a href="../pages/profile.php" class="btn btn-primary mt-3">Edit Profile</a>

                        <div class="social-links mt-3 d-flex justify-content-center">
                            <a href="#" class="btn btn-social-icon btn-twitter mx-1"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-social-icon btn-facebook mx-1"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-social-icon btn-instagram mx-1"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/abdalla-yasser-787416295" class="btn btn-social-icon btn-linkedin mx-1" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php include_once '../shared/footer.php' ?>
<?php include_once '../shared/script.php' ?>