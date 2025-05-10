<?php
$conn = new mysqli("localhost", "root", "", "full_report");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_POST['id']);
$batch = intval($_POST['batch']);
$type = $_POST['type'];
$equipment_cost = floatval($_POST['equipment_cost']);
$vaccine = floatval($_POST['vaccine']);
$foods = floatval($_POST['foods']);

$stmt = $conn->prepare("UPDATE hamster_expenses SET batch=?, type=?, equipment_cost=?, vaccine=?, foods=? WHERE id=?");
$stmt->bind_param("isdssi", $batch, $type, $equipment_cost, $vaccine, $foods, $id);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: view_expenses.php");
exit;
?>
