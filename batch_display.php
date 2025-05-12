<?php
$batch = $_POST['batchNumber'] ?? '';
$breed = $_POST['breed'] ?? '';
$quantity = $_POST['quantity'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Batch Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B22222;
            margin: 0;
            padding: 20px;
            color: white;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
            color: black;
        }
        h1 {
            color: #c0392b;
            text-align: center;
        }
        .info-group {
            margin: 20px 0;
            font-size: 18px;
        }
        .buttons {
            margin-top: 20px;
            text-align: center;
        }
        .button {
            background-color: #c0392b;
            color: white;
            padding: 10px 18px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
        .button:hover {
            background-color: #a93226;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Batch Info</h1>
    <div class="info-group"><strong>Batch Number:</strong> <?= htmlspecialchars($batch) ?></div>
    <div class="info-group"><strong>Breed:</strong> <?= htmlspecialchars($breed) ?></div>
    <div class="info-group"><strong>Quantity:</strong> <?= htmlspecialchars($quantity) ?></div>

    <div class="buttons">
        <a href="view_expenses.php?batch=<?= urlencode($batch) ?>" class="button">View Expenses</a>
        <a href="add_expenses.php?batch=<?= urlencode($batch) ?>" class="button">Add Expenses</a>
        <a href="batch_form.php" class="button">Add New</a>
    </div>
</div>
</body>
</html>
