<?php
$conn = new mysqli('localhost', 'root', '', 'full_report');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$batchId = $_GET['batch_id'] ?? null;
if (!$batchId) {
    echo "Invalid batch ID.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $batch = $_POST['batch'];
    $type = $_POST['type'];
    $equipment_cost = $_POST['equipment_cost'];
    $vaccine = $_POST['vaccine'];
    $foods = $_POST['foods'];

    $stmt = $conn->prepare("INSERT INTO hamster_expenses (batch, type, equipment_cost, vaccine, foods) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssddd", $batch, $type, $equipment_cost, $vaccine, $foods);
    $stmt->execute();
    $stmt->close();

    header("Location: view_expenses.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamster Expenses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B22222;
            color: white;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 800px;
            margin: 0 auto;
            color: black;
        }
        h1 {
            color: #c0392b;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="number"], input[type="decimal"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button {
            padding: 10px 20px;
            background-color: #c0392b;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .button:hover {
            background-color: #a93226;
        }
        .back-button {
            display: block;
            width: fit-content;
            margin-top: 20px;
            padding: 6px 16px;
            font-size: 14px;
            background-color: #c0392b;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
        }
        .back-button:hover {
            background-color: #a93226;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Enter Hamster Expenses</h1>
        <form method="POST" action="">
            <label for="batch">Batch:</label>
            <input type="text" id="batch" name="batch" required>

            <label for="type">Breed:</label>
            <input type="text" id="type" name="type" required>

            <label for="equipment_cost">Equipment Cost:</label>
            <input type="number" id="equipment_cost" name="equipment_cost" step="0.01" required>

            <label for="vaccine">Vaccine Cost:</label>
            <input type="number" id="vaccine" name="vaccine" step="0.01" required>

            <label for="foods">Food Cost:</label>
            <input type="number" id="foods" name="foods" step="0.01" required>

            <button type="submit" class="button">Submit</button>
        </form>
        <a href="hamsterfrnt.html" class="back-button">Back</a>
    </div>
</body>
</html>
