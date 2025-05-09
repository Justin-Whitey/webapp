<?php
$conn = new mysqli("localhost", "root", "", "full_report");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$batch = $_POST['batch'];
$type = $_POST['type'];
$equipment = $_POST['equipment'];
$vaccine = $_POST['vaccine'];
$foods = $_POST['foods'];

for ($i = 0; $i < count($batch); $i++) {
    $b = intval($batch[$i]);
    $t = $conn->real_escape_string($type[$i]);
    $e = floatval($equipment[$i]);
    $v = floatval($vaccine[$i]);
    $f = floatval($foods[$i]);

    $sql = "INSERT INTO hamster_expenses (batch, type, equipment_cost, vaccine, foods) 
            VALUES ($b, '$t', $e, $v, $f)";
    $conn->query($sql);
}

$conn->close();
header("Location: view_expenses.php");
exit;
?>
