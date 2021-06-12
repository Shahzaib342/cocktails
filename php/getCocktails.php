<?php

if (isset($_GET["delete"]))
    include('../config/db.php');
else
    include('config/db.php');

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM cocktails where id = $id";
    $result = $mysqli->query($sql);
}
else if ($_GET["search"]) {
    $search = $_GET["search"];
    $sql = "SELECT * FROM cocktails where title like '%$search%'";
    $result = $mysqli->query($sql);
}

else if (isset($_GET["delete"])) {
    $delete_id =  $_GET["delete"];
    $sql = "DELETE FROM comments where id =  $delete_id";
    $mysqli->query($sql);
    echo "<script type='text/javascript'>alert('Comment is successfully deleted.');
    window.location='/admin/comments'; </script>";
}

else {
    $sql = "SELECT * FROM cocktails";
    $result = $mysqli->query($sql);
}

