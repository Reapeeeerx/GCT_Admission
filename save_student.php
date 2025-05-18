<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["full_name"]);        // Matches form name="full_name"
    $course = trim($_POST["course"]);         // Matches form name="course"
    $phone = trim($_POST["phone"]);           // Matches form name="phone"

    if (!empty($name) && !empty($course) && !empty($phone)) {
        $entry = "$name|$course|$phone\n";
        file_put_contents("student_data.txt", $entry, FILE_APPEND);
        header("Location: Processed.html");
        exit();
    } else {
        echo "<script>alert('Please complete the required fields.'); window.location.href='MainPage.html';</script>";
    }
}
?>
