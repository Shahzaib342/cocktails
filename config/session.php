<?php
//starting session
session_start();
//if the session for username has not been set, initialise it
if (!isset($_SESSION['session_id'])) {
    $_SESSION['session_id'] = "";
    $_SESSION['session_user'] = "";
    $_SESSION['session_lastname'] = "";
    $_SESSION['session_email'] = "";
}
//save username and access in the session
$session_id = $_SESSION['session_id'];
$session_email = $_SESSION['session_email'];
$session_user = $_SESSION['session_user'];
$session_lastname = $_SESSION['session_lastname'];
?>
