<?php
$host = 'localhost';
$dbname = 'rbquantity';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$batchId = $_GET['batch_id'] ?? null;

if ($batchId) {
    $stmt = $conn->prepare("DELETE FROM batches WHERE id = ?");
    $stmt->bind_param("i", $batchId);
    $stmt->execute();
}

$conn->close();

header("Location: rabbit_batch_list.php");
exit();
?>
