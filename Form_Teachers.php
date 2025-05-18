<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Management</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .teacher-card {
            border: 1px solid #004080;
            border-radius: 10px;
            padding: 15px;
            margin: 10px;
            background: #f0f8ff;
            display: inline-block;
            width: 200px;
            text-align: center;
        }
        .teacher-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .delete-button {
            background: #cc0000;
            color: white;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Manage Teachers</h2>

    <form action="add_teacher.php" method="POST" enctype="multipart/form-data">
        <label>Teacher Name:</label>
        <input type="text" name="teacher_name" required>
        <label>Upload 1x1 Picture:</label>
        <input type="file" name="teacher_image" accept="image/*" required>
        <button type="submit">Add Teacher</button>
    </form>

    <hr>

    <?php
    $data_file = "teacher_data.txt";
    if (file_exists($data_file)) {
        $lines = file($data_file, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $index => $line) {
            list($name, $img) = explode("|", $line);
            echo "<div class='teacher-card'>
                    <img src='uploads/$img' class='teacher-img'><br>
                    <strong>$name</strong><br><br>
                    <form action='delete_teacher.php' method='POST'>
                        <input type='hidden' name='index' value='$index'>
                        <input type='hidden' name='filename' value='$img'>
                        <button class='delete-button' type='submit'>Delete</button>
                    </form>
                  </div>";
        }
    } else {
        echo "<p>No teachers found.</p>";
    }
    ?>

    <br><br>
    <button onclick="window.location.href='Admin_Dashboard.html'">Back to Dashboard</button>
</body>
</html>
