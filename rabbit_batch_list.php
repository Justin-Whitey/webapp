<?php
$host = 'localhost';
$dbname = 'rbquantity';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM batches ORDER BY date_created DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rabbit Batch List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: 0 auto;
            color: black;
        }
        h1 {
            color: #c0392b;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            text-align: center;
            font-weight: bold;
        }
        .btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            justify-content: center;
        }
        .button {
            padding: 8px 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            min-width: 100px;
            text-align: center;
        }
        .button:hover {
            background-color: #c0392b;
            color: white;
        }
        .button-container {
            margin-top: 25px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Rabbit Batch List</h1>
    
    <div class="button-container mb-3">
        <a href="rabbit_batch_form.php" class="button">Add New Batch</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Batch Number</th>
                <th>Breed</th>
                <th>Quantity</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['batch_number'] ?></td>
                    <td><?= $row['breed'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= date('F j, Y', strtotime($row['date_created'])) ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="rabbit_display.php?batch_id=<?= $row['id'] ?>" class="button">View</a>
                            <a href="rabbitexp.php?batch_id=<?= $row['id'] ?>" class="button">Add Expense</a>
                            <a href="rabbit_batch_edit.php?batch_id=<?= $row['id'] ?>" class="button">Edit</a>
                            <a href="rabbit_batch_delete.php?batch_id=<?= $row['id'] ?>" class="button" onclick="return confirm('Are you sure you want to delete this entry?');">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="button-container">
        <a href="rabbitfrnt.html" class="button">Back</a>
    </div>
</div>

</body>
</html>

<?php $conn->close(); ?>
