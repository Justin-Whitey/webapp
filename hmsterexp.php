<?php
$conn = new mysqli('localhost', 'root', '', 'hamster_expenses');
if ($conn->connect_error) die("Connection failed");

$batchId = $_GET['batch_id'] ?? null;
if (!$batchId) {
    echo "Invalid batch ID.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $expense_name = $_POST['expense_name'];
    $amount = $_POST['amount'];

    $stmt = $conn->prepare("INSERT INTO expenses (batch_id, expense_name, amount) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $batchId, $expense_name, $amount);
    $stmt->execute();
    $stmt->close();

    header("Location: hamster_batch_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Hamster Expense</title>
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
            margin: auto;
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
        input[type="text"], input[type="number"] {
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
        <h1>Add Expense for Batch #<?= htmlspecialchars($batchId) ?></h1>
        <form method="POST" action="">
            <label for="expense_name">Expense Name:</label>
            <input type="text" id="expense_name" name="expense_name" required>

            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" step="0.01" required>

            <button type="submit" class="button">Save Expense</button>
        </form>
        <a href="hamster_batch_list.php" class="back-button">Back to Batch List</a>
    </div>
</body>
</html>
