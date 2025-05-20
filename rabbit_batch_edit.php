<?php
$host = 'localhost';
$dbname = 'rbquantity';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['batch_id'])) {
    die("Batch ID not provided.");
}

$batch_id = (int)$_GET['batch_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batch_number = $_POST['batch_number'];
    $breed = $_POST['breed'];
    $quantity = $_POST['quantity'];
    $date_updated = date('Y-m-d');

    $stmt = $conn->prepare("UPDATE batches SET batch_number = ?, breed = ?, quantity = ?, date_updated = ? WHERE id = ?");
    $stmt->bind_param("ssisi", $batch_number, $breed, $quantity, $date_updated, $batch_id);
    $stmt->execute();
    $stmt->close();

    header("Location: rabbit_batch_list.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM batches WHERE id = ?");
$stmt->bind_param("i", $batch_id);
$stmt->execute();
$result = $stmt->get_result();
$batch = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Rabbit Batch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B22222;
            color: white;
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
        h2 {
            text-align: center;
            color: #c0392b;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
        .button {
            padding: 10px;
            background-color: #c0392b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .button:hover {
            background-color: #a93226;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Rabbit Batch</h2>
        <form method="POST">
            <label>Batch Number:</label>
            <input type="text" name="batch_number" value="<?= $batch['batch_number'] ?>" required>

            <label>Breed:</label>
            <input type="text" name="breed" value="<?= $batch['breed'] ?>" required>

            <label>Quantity:</label>
            <input type="number" name="quantity" value="<?= $batch['quantity'] ?>" required>

            <button type="submit" class="button">Update Batch</button>
        </form>
    </div>
</body>
</html>
