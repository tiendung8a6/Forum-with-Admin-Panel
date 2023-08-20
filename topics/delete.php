<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = $conn->query("SELECT * FROM topics WHERE id='$id' ");
    $select->execute();
    $topic = $select->fetch(PDO::FETCH_OBJ);

    if ($topic->user_name !== $_SESSION['username']) {
        header("location: " . APPURL . " ");
    } else {
        $delete = $conn->query("DELETE  FROM topics WHERE id='$id' ");
        $delete->execute();
        header("location: " . APPURL . " ");
    }
}
?>