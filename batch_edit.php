<?php
$host = 'localhost';
$dbname = 'quantity';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['batch_id'])) {
    header("Location: batch_list.php");
    exit();
}

$batch_id = (int)$_GET['batch_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batch_number = $conn->real_escape_string($_POST['batch_number']);
    $breed = $conn->real_escape_string($_POST['breed']);
    $quantity = (int)$_POST['quantity'];

    $conn->query("UPDATE batches SET batch_number = '$batch_number', breed = '$breed', quantity = $quantity, date_updated = NOW() WHERE id = $batch_id");

    header("Location: batch_list.php");
    exit();
}

$result = $conn->query("SELECT * FROM batches WHERE id = $batch_id");
if ($result->num_rows !== 1) {
    echo "Batch not found.";
    exit();
}
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Batch</title>
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
            color: black;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #c0392b;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button {
            padding: 10px;
            background-color: #c0392b;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #a93226;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #c0392b;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Batch</h1>
        <form method="POST">
            <label for="batch_number">Batch Number</label>
            <input type="text" name="batch_number" id="batch_number" value="<?= htmlspecialchars($row['batch_number']) ?>" required>

            <label for="breed">Breed</label>
            <input type="text" name="breed" id="breed" value="<?= htmlspecialchars($row['breed']) ?>" required>

            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="<?= (int)$row['quantity'] ?>" required>

            <button type="submit" class="button">Update Batch</button>
        </form>
        <a href="batch_list.php" class="back-link">← Back to List</a>
    </div>
</body>
</html>
