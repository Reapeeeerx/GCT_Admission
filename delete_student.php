<?php
if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $file = "student_data.txt";

    $lines = file($file, FILE_IGNORE_NEW_LINES);
    unset($lines[$index]);

    file_put_contents($file, implode(PHP_EOL, $lines));
}
header("Location: Form_Student.php");
exit();
