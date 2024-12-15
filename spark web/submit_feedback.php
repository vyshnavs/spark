<?php
$servername = "sql312.infinityfree.com";
$username = "if0_37019640";
$password = "MGM9ybx00R";
$dbname = "if0_37019640_feedbacks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = $_POST['feedback'];

    $stmt = $conn->prepare("INSERT INTO feedback (feedback_text) VALUES (?)");
    $stmt->bind_param("s", $feedback);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
