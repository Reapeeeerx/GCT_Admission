<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .student-card {
            border: 1px solid #004080;
            border-radius: 10px;
            padding: 15px;
            margin: 10px;
            background: #f0f8ff;
        }
        .delete-button {
            background: #cc0000;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Registered Students</h2>

    <?php
    $filename = "student_data.txt";

    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $index => $line) {
            list($name, $course, $phone) = explode("|", $line);
            echo "<div class='student-card'>
                    <strong>Name:</strong> $name<br>
                    <strong>Course:</strong> $course<br>
                    <strong>Phone:</strong> $phone<br><br>
                    <form method='POST' action='delete_student.php'>
                        <input type='hidden' name='index' value='$index'>
                        <button type='submit' class='delete-button'>Delete</button>
                    </form>
                  </div>";
        }
    } else {
        echo "<p>No student records found.</p>";
    }
    ?>

    <br>
    <button onclick="window.location.href='Admin_Dashboard.html'">Back to Dashboard</button>
</body>
</html>
