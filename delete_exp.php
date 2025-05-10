<?php
$conn = new mysqli("localhost", "root", "", "full_report");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$conn->query("DELETE FROM hamster_expenses WHERE id = $id");
$conn->close();

header("Location: view_expenses.php");
exit;
?>
