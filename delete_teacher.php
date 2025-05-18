<?php
if (isset($_POST["index"])) {
    $index = $_POST["index"];
    $filename = $_POST["filename"];

    $lines = file("teacher_data.txt", FILE_IGNORE_NEW_LINES);
    unset($lines[$index]);
    file_put_contents("teacher_data.txt", implode(PHP_EOL, $lines));

    $filepath = "uploads/" . $filename;
    if (file_exists($filepath)) {
        unlink($filepath);
    }
}

header("Location: Form_Teachers.php");
exit();
