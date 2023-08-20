<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if (!isset($_SESSION['adminname'])) {
  header("location: " . ADMINURL . "/admins/login-admins.php ");
}

$replies = $conn->query("SELECT * FROM replies ");
$replies->execute();
$allReplies = $replies->fetchALL(PDO::FETCH_OBJ);

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Replies</h5>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">reply</th>
              <th scope="col">user image</th>
              <th scope="col">user name</th>
              <th scope="col">go to topic</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allReplies as $reply) : ?>
              <tr>
                <th scope="row"><?php echo $reply->id; ?></th>
                <td><?php echo $reply->reply; ?></td>
                <td><?php echo $reply->user_name; ?></td>
                <td><a href="http://localhost:8080/forum/topics/topic.php?id=<?php echo $reply->topic_id; ?>" class="btn btn-success text-center ">go to topic</a></td>
                <td><a href="delete-replies.php?id=<?php echo $reply->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>