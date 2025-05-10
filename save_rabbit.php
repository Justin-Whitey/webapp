<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "report_rabbit";

$conn = new mysqli($host, $user, $pass, $db);

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

    if ($batch != "" && $type != "") {
        $sql = "INSERT INTO rabbit_expenses (batch, type, equipment, vaccine, foods) 
                VALUES ('$batch', '$type', '$equip', '$vacc', '$food')";
        $conn->query($sql);
    }
}

$conn->close();

header("Location: rabbit_display.php");
exit();
