<?php
$conn = new mysqli('localhost', 'root', '', 'rbquantity');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['batch_id'] ?? null;

if (!$id) {
    echo "Invalid ID";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batch = $_POST['batch'];
    $breed = $_POST['breed'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("UPDATE batches SET batch_number = ?, breed = ?, quantity = ? WHERE id = ?");
    $stmt->bind_param("ssii", $batch, $breed, $quantity, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: rabbit_batch_list.php");
    exit();
}

$result = $conn->query("SELECT * FROM batches WHERE id = $id");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Rabbit Batch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B22222;
            margin: 0;
            padding: 40px;
            color: white;
        }
        .container {
            background-color: #fff;
            color: black;
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        h2 {
            text-align: center;
            color: #c0392b;
            margin-bottom: 25px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn-submit {
            background-color: #c0392b;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
        }
        .btn-submit:hover {
            background-color: #a52a2a;
        }
        .back-btn {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #c0392b;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Rabbit Batch</h2>
    <form method="POST">
        <label for="batch">Batch Number:</label>
        <input type="text" id="batch" name="batch" value="<?= $data['batch_number'] ?>" required>

        <label for="breed">Breed:</label>
        <input type="text" id="breed" name="breed" value="<?= $data['breed'] ?>" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="<?= $data['quantity'] ?>" required>

        <button type="submit" class="btn-submit">Update</button>
        <a href="rabbit_batch_list.php" class="back-btn">← Back to List</a>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
