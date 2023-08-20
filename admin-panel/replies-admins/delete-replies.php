<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['adminname'])) {
    header("location: " . ADMINURL . "/admins/login-admins.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $conn->query("DELETE FROM replies WHERE id = '$id' ");
    $delete->execute();
    header("location: show-replies.php");
}
?>
<?php require "../layouts/footer.php"; ?>