<?php
if (isset($_POST['upload'])) {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'video_streaming');

    // Get the form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $video = $_FILES['video']['name'];
    $target = "uploads/" . basename($video);

    // Move the uploaded file to the "uploads" folder
    if (move_uploaded_file($_FILES['video']['tmp_name'], $target)) {
        // Insert video information into the database
        $conn->query("INSERT INTO videos (title, description, video_path) VALUES ('$title', '$description', '$video')");
        echo "Video uploaded successfully!";
    } else {
        echo "Failed to upload video.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Upload a New Video</h1>
    <a href="upload.html">Go back to upload page</a>
</body>
</html>
