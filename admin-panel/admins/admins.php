<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['adminname'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php ");
}
$admins = $conn->query("SELECT * FROM admins ");
$admins->execute();
$allAdmins = $admins->fetchALL(PDO::FETCH_OBJ);

// var_dump($allAdmins);

?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Admins</h5>
        <a href="<?php echo ADMINURL; ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Admin name</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allAdmins as $admins) :; ?>
              <tr>
                <th scope="row"><?php echo $admins->id; ?></th>
                <td><?php echo $admins->adminname; ?></td>
                <td><?php echo $admins->email; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>