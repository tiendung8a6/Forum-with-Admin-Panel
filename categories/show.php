<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $topics = $conn->query("SELECT * FROM topics WHERE category = '$name' ");
    $topics->execute();
    $allTopics = $topics->fetchAll(PDO::FETCH_OBJ);
} else {
    header("location: " . APPURL . "/404.php");
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="main-col">
                <div class="block">
                    <h1 class="pull-left">Welcome to Forum</h1>
                    <h4 class="pull-right">A Simple Forum</h4>
                    <div class="clearfix"></div>
                    <hr>
                    <ul id="topics">
                        <?php foreach ($allTopics as $topic) :  ?>
                            <li class="topic">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="avatar pull-left" src="../img/<?php echo $topic->user_image; ?>" />
                                    </div>
                                    <div class="col-md-10">
                                        <div class="topic-content pull-right">
                                            <h3><a href="../topics/topic.php?id=<?php echo $topic->id; ?>"><?php echo $topic->title; ?></a></h3>
                                            <div class="topic-info">
                                                <a href="<?php echo APPURL; ?>/categories/show.php?name=<?php echo $topic->category; ?>"><?php echo $topic->category; ?></a> >> 
                                                <a href="<?php echo APPURL; ?>/users/profile.php?name=<?php echo $topic->user_name; ?>"><?php echo $topic->user_name; ?></a> >> Posted on: <?php echo $topic->created_at; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
<?php require "../includes/footer.php"; ?>