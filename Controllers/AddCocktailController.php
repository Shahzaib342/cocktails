<?php

include "../config/db.php";
include "../config/session.php";


if (isset($_POST)) {
//first upload the cocktail image
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if (!$check) {
        echo "<script type='text/javascript'>alert('Cocktail image is not an actual image.');
    window.location='/admin/addCocktail';</script>";
        return false;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<script type='text/javascript'>alert('Sorry, your file is too large.');
    window.location='/admin/addCocktail';</script>";
        return false;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
    window.location='/admin/addCocktail';</script>";
        return false;
    }

// if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $title = $_POST['title'];
        $type = $_POST['type'];
        $glass_type = $_POST['glass-type'];
        $instructions = htmlentities($_POST['instructions']);
        $ingrediants = htmlentities($_POST['Ingrediants']);
        $photo = basename($_FILES["fileToUpload"]["name"]);
        $sql = "INSERT INTO cocktails (title,type,glass_type,instructions,ingrediants,photo) VALUES
('$title','$type','$glass_type','$instructions','$ingrediants','" . $photo . "')";
        if (!$mysqli->query($sql)) {
            echo "<script type='text/javascript'>alert('Database Error: There has been an error occurred in database please contact support');
    window.location='/admin/addCocktail';</script>";
            return false;
        } else {
            header('location: /admin');
        }
    } else {
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');
    window.location='/admin/addCocktail';</script>";
        return false;
    }
} else {
    var_dump('You are at wrong place');
    die();
}
?>