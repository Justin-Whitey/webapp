<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "report_rabbit";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM rabbit_expenses WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: rabbit_display.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
