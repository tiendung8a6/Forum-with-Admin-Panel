<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['adminname'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php ");
}
$topics = $conn->query("SELECT * FROM topics ");
$topics->execute();
$allTopics = $topics->fetchALL(PDO::FETCH_OBJ);
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Topics</h5>
        <table class="table mt-4">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">title</th>
              <th scope="col">category</th>
              <th scope="col">user</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allTopics as $topics) : ?>
              <tr>
                <th scope="row"><?php echo $topics->id; ?></th>
                <td><?php echo $topics->title; ?></td>
                <td><?php echo $topics->category; ?></td>
                <td><?php echo $topics->user_name; ?></td>
                <td><a href="delete-topic.php?id=<?php echo $topics->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>