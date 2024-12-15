<?php
$servername = "sql312.infinityfree.com";
$username = "if0_37019640";
$password = "MGM9ybx00R";
$dbname = "if0_37019640_feedbacks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT feedback_text FROM feedback ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="feedback-item">' . htmlspecialchars($row["feedback_text"]) . '</div>';
    }
} else {
    echo "No feedback available";
}

$conn->close();
?>
