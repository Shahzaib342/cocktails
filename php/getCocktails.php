<?php

include('config/db.php');
include('config/session.php');

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

else {
    $sql = "SELECT * FROM cocktails";
    $result = $mysqli->query($sql);
}

