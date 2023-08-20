<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
// if(isset($_SESSION['adminname'])){
//   header("location: ".ADMINURL."/admins/login-admins.php");
// }

//count_topics
$topics = $conn->query("SELECT COUNT(*) AS count_topics FROM topics");
$topics->execute();
$allTopics = $topics->fetch(PDO::FETCH_OBJ);

//count_categories
$categories = $conn->query("SELECT COUNT(*) AS count_categories FROM categories");
$categories->execute();
$allCategories = $categories->fetch(PDO::FETCH_OBJ);

//count_admins
$admins = $conn->query("SELECT COUNT(*) AS count_admins FROM admins");
$admins->execute();
$allAdmins = $admins->fetch(PDO::FETCH_OBJ);

//count_replies
$replies = $conn->query("SELECT COUNT(*) AS count_replies FROM replies");
$replies->execute();
$allReplies = $replies->fetch(PDO::FETCH_OBJ);
?>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Topics</h5>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
        <p class="card-text">number of topics: <?php echo $allTopics->count_topics; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Categories</h5>
        <p class="card-text">number of categories: <?php echo $allCategories->count_categories; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>
        <p class="card-text">number of admins: <?php echo $allAdmins->count_admins; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Replies</h5>
        <p class="card-text">number of replies:<?php echo $allReplies->count_replies; ?> </p>
      </div>
    </div>
  </div>
</div>
<?php require "layouts/footer.php"; ?>