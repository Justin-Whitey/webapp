<?php
$conn = new mysqli('localhost', 'root', '', 'report_rabbit');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$batches = $_POST['batch'];
$types = $_POST['type'];
$equipment = $_POST['equipment'];
$vaccine = $_POST['vaccine'];
$foods = $_POST['foods'];

for ($i = 0; $i < count($batches); $i++) {
    $batch = $batches[$i];
    $type = $types[$i];
    $equip = $equipment[$i];
    $vacc = $vaccine[$i];
    $food = $foods[$i];

    if ($batch !== "" && $type !== "") {
        $stmt = $conn->prepare("INSERT INTO rabbit_expenses (batch, type, equipment, vaccine, foods) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssddd", $batch, $type, $equip, $vacc, $food);
        $stmt->execute();
    }
}

$conn->close();

header("Location: rabbit_display.php");
exit();
?>
