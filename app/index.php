<?php include_once '../core/config.php' ?>
<?php include_once '../shared/head.php' ?>
<?php include_once '../shared/header.php' ?>
<?php include_once '../shared/asid.php' ?>
<?php include_once '../core/config.php' ?>
<?php include_once '../core/path.php' ?>
<?php
// Get all users from the database
$select = "SELECT * FROM users";
$result = mysqli_query($connect, $select);

//  delete users from the database
if (isset($_GET['delete'])) {
  $usr_id = $_GET['delete'];
  $delete = "DELETE FROM users WHERE id = '$usr_id'";
  mysqli_query($connect, $delete);
  redirect('app/index.php');
}
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <a href="create.php" class="btn btn-primary btn-sm float-end mt-3">Create new</a>
            <h5 class="card-title">Datatables </h5>
            <!-- button create -->
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>view</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($result as $row): ?>
                  <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><a href="view.php" class="btn btn-info">View</a></td>
                    <td><a href="?delete=<?= $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                  </tr>
                <?php endforeach; ?>
                </tr>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php include_once '../shared/footer.php' ?>
<?php include_once '../shared/script.php' ?>