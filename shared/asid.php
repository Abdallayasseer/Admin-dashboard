<?php include_once 'C:\xampp\htdocs\project_auth\core\path.php' ?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?= URL("") ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= URL("app/index.php") ?>">
                <i class="bi bi-gem"></i><span>Users</span>
            </a>
        </li><!-- End Icons Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= URL("pages/profile.php") ?>"">
          <i class=" bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= URL("pages/contact.php") ?>">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= URL("pages/register.php") ?>">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= URL("pages/login.php") ?>">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= URL("pages/error-404.php") ?>">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->
    </ul>

</aside><!-- End Sidebar-->