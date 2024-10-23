
<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'video_streaming');

// Fetch videos from the database
$result = $conn->query("SELECT * FROM videos");

// Include the home HTML file
include 'home.html';
?>
<div class="videos">
    <?php while ($video = $result->fetch_assoc()) { ?>
        <div class="video">
            <h2><?php echo $video['title']; ?></h2>
            <video width="320" height="240" controls>
                <source src="uploads/<?php echo $video['video_path']; ?>" type="
