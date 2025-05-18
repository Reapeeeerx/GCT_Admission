<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        $entry = "$username,$password\n";
        file_put_contents("admin.txt", $entry, FILE_APPEND);
        echo "<script>alert('Registration successful!'); window.location.href='Admin_Login.html';</script>";
    } else {
        echo "<script>alert('Please fill in all fields.'); window.location.href='Register.html';</script>";
    }
}
?>
