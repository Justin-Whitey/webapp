<?php
$host = 'localhost';
$dbname = 'quantity';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $batchNumber = $_POST['batchNumber'];
    $breed = $_POST['breed'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO batches (batch_number, breed, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $batchNumber, $breed, $quantity);
    $stmt->execute();
    $stmt->close();

    header("Location: batch_list.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batch Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B22222;
            color: white;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
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
        <h1>Enter Batch Information</h1>
        <form method="POST" action="">
            <label for="batchNumber">Batch Number:</label>
            <input type="number" id="batchNumber" name="batchNumber" min="1" required>

            <label for="breed">Breed:</label>
            <input type="text" id="breed" name="breed" placeholder="Enter breed" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>

            <button type="submit" class="button">Submit</button>
        </form>
        <a href="hamsterfrnt.html" class="back-button">Back</a>
    </div>
</body>
</html>
