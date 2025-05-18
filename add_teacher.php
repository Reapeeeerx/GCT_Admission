<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["teacher_name"]);
    $img = $_FILES["teacher_image"];

    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    $ext = pathinfo($img["name"], PATHINFO_EXTENSION);
    $filename = uniqid() . "." . $ext;
    move_uploaded_file($img["tmp_name"], "uploads/" . $filename);

    $entry = "$name|$filename\n";
    file_put_contents("teacher_data.txt", $entry, FILE_APPEND);
}

header("Location: Form_Teachers.php");
exit();
