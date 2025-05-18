<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$valid = false;

if (file_exists("admin.txt")) {
    $lines = file("admin.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list($saved_user, $saved_pass) = explode(",", $line);
        if (trim($username) === trim($saved_user) && trim($password) === trim($saved_pass)) {
            $valid = true;
            break;
        }
    }
}

if ($valid) {
    $_SESSION['admin'] = $username;
    header("Location: Admin_Dashboard.html");
} else {
    echo "<script>alert('Invalid login!'); window.location.href='Admin_Login.html';</script>";
}
?>
