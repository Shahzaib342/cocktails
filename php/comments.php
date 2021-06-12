<?php
if (isset($_POST["comment"]))
    include('../config/db.php');
if($_SERVER["REQUEST_URI"] == '/admin/comments')
    include "config/db.php";

if (isset($_POST["comment"])) {
    $comment = $_POST['comment'];
    $cocktail_id = $_POST['cocktail-id'];
    $sql = "INSERT INTO comments (`comment`,`cocktail_id`) VALUES ('$comment','$cocktail_id')";
    $mysqli->query($sql);
    echo "<script type='text/javascript'>alert('Comment is successfully added.');
    window.location='/home/cocktailDetails?id=" . $cocktail_id . "'; </script>";
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM comments where cocktail_id = $id";
    $comments = $mysqli->query($sql);
}

else {
    $sql = "SELECT * FROM comments";
    $comments = $mysqli->query($sql);
}

