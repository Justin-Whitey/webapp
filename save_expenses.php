<?php
$conn = new mysqli("localhost", "root", "", "full_report");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$batch = $_POST['batch'] ?? [];
$type = $_POST['type'] ?? [];
$equipment = $_POST['equipment'] ?? [];
$vaccine = $_POST['vaccine'] ?? [];
$foods = $_POST['foods'] ?? [];

$count = count($batch);

$stmt = $conn->prepare("INSERT INTO hamster_expenses (batch, type, equipment_cost, vaccine, foods) VALUES (?, ?, ?, ?, ?)");

for ($i = 0; $i < $count; $i++) {
    $b = intval($batch[$i]);
    $t = $type[$i] ?? '';
    $e = floatval($equipment[$i]);
    $v = floatval($vaccine[$i]);
    $f = floatval($foods[$i]);

    $stmt->bind_param("isdss", $b, $t, $e, $v, $f);
    $stmt->execute();
}

$stmt->close();
$conn->close();

header("Location: view_expenses.php");
exit;
?>
