<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['username'], $_POST['p'])) {
    $username = $_POST['username'];
    $password = $_POST['p']; // The hashed password.

    if (login($username, $password, $mysqli) == true) {
        // Login success, now determine whether teacher or student
        if ($_SESSION["role"] === "student") {
            header('Location: ../profile_student.php');
        } else if ($_SESSION["role"] === "teacher" || $_SESSION["role"] === "admin") {
            header('Location: ../profile_teacher.php');
        }
    } else {
        // Login failed
        header('Location: ../login.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page.
    echo 'Invalid Request';
}