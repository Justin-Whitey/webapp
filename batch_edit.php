<?php
$host = 'localhost';
$dbname = 'quantity';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['batch_id'])) {
    $batch_id = $_GET['batch_id'];
    $result = $conn->query("SELECT * FROM batches WHERE id = $batch_id");
    $batch = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batch_id = $_POST['batch_id'];
    $batch_number = $_POST['batch_number'];  
    $breed = $_POST['breed'];
    $quantity = $_POST['quantity'];

    
    $stmt = $conn->prepare("UPDATE batches SET batch_number = ?, breed = ?, quantity = ?, date_created = NOW() WHERE id = ?");
    $stmt->bind_param("ssii", $batch_number, $breed, $quantity, $batch_id);
    $stmt->execute();
    $stmt->close();

    
    header("Location: batch_list.php");
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Batch</title>
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
        <input type="hidden" name="batch_id" value="<?= $batch['id'] ?>">

        <label for="batch_number">Batch Number:</label>
        <input type="text" name="batch_number" id="batch_number" value="<?= $batch['batch_number'] ?>" required>

        <label for="breed">Breed:</label>
        <input type="text" name="breed" id="breed" value="<?= $batch['breed'] ?>" required>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="<?= $batch['quantity'] ?>" required>

        <button type="submit" class="btn-submit">Update Batch</button>
        <a href="batch_list.php" class="back-btn">← Back to List</a>
    </form>
</div>

</body>
</html>
