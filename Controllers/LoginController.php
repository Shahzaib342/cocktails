<?php

include "../config/db.php";
include "../config/session.php";

if (isset($_POST)) {
    $user_email = trim($_POST['loginEmail']);
    $user_password = $_POST['loginPassword'];

    $salt = "KIT502";
    $encrypted_pwd = crypt($user_password, $salt);

    $sql = "SELECT * FROM users WHERE email='$user_email'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if (is_null($row)) {
        echo "Cannot locate your email in our system, please confirm your email.";
    } else {
        if ($row['password'] == $encrypted_pwd) {

            $_SESSION['session_id'] = $row['id'];
            $_SESSION['session_user'] = $row['first_name'];
            $_SESSION['session_lastname'] = $row['last_name'];
            $_SESSION['session_email'] = $row['email'];

            echo '<script type="text/javascript"> $("#loginModal").modal("hide") </script>';

            $welcomeMsg = "Hi " . $_SESSION['session_user'] . ", you are now logged in.";
            echo '<script type="text/javascript"> alert("' . $welcomeMsg . '") </script>';
            echo '<script type="text/javascript"> window.location.reload() </script>';

        } else {
            echo "Invalid password! Please try again.";
        }
    }
}
