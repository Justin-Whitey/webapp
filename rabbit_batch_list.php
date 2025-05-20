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
    <title>Rabbit Batch List</title>
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
            max-width: 1000px;
            margin: auto;
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
        }
        .button {
            padding: 8px 12px;
            background-color: #c0392b;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            margin: 2px;
        }
        .button:hover {
            background-color: #a93226;
        }
        .action-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 6px;
        }
        .back-button {
            padding: 6px 16px;
            font-size: 14px;
            background-color: gray;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
        }
        .back-button:hover {
            background-color: #5a5a5a;
        }
        .add-new-button {
            padding: 6px 16px;
            font-size: 14px;
            background-color: #c0392b;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
        }
        .add-new-button:hover {
            background-color: #a93226;
        }
        .bottom-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rabbit Batch List</h1>

        <table>
            <thead>
                <tr>
                    <th>Batch Number</th>
                    <th>Breed</th>
                    <th>Quantity</th>
                    <th>Date Created</th>
                    <th>Last Updated</th>
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
                        <td><?= $row['date_updated'] ? date('F j, Y', strtotime($row['date_updated'])) : '—' ?></td>
                        <td>
                            <div class="action-group">
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

        <div class="bottom-buttons">
            <a href="rabbit_batch_form.php" class="add-new-button">Add New</a>
            <a href="rabbitfrnt.html" class="back-button">Back</a>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
