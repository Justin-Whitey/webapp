<?php
$host = 'localhost';
$dbname = 'quantity';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];
    $conn->query("DELETE FROM batches WHERE id = $delete_id");
    header("Location: batch_list.php");
    exit();
}

$result = $conn->query("SELECT * FROM batches");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Batch Entries</title>
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
        .footer-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        .back-button {
            padding: 8px 16px;
            font-size: 14px;
            background-color: #808080;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
        }
        .back-button:hover {
            background-color: #696969;
        }
        .add-new-button {
            padding: 8px 16px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>All Batch Entries</h1>
        
        <table>
            <tr>
                <th>Batch Number</th>
                <th>Breed</th>
                <th>Quantity</th>
                <th>Date Created</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['batch_number']; ?></td>
                    <td><?php echo $row['breed']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo date('F j, Y', strtotime($row['date_created'])); ?></td>
                    <td><?php echo $row['date_updated'] ? date('F j, Y', strtotime($row['date_updated'])) : '—'; ?></td>
                    <td>
                        <div class="action-group">
                            <a href="view_expenses.php?batch_id=<?php echo $row['id']; ?>" class="button">View Expenses</a>
                            <a href="add_expenses.php?batch_id=<?php echo $row['id']; ?>" class="button">Add Expenses</a>
                            <a href="batch_list.php?delete_id=<?php echo $row['id']; ?>" class="button" onclick="return confirm('Are you sure you want to delete this entry?');">Delete</a>
                            <a href="batch_edit.php?batch_id=<?php echo $row['id']; ?>" class="button">Edit</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <div class="footer-buttons">
            <a href="hamsterfrnt.html" class="back-button">Back</a>
            <a href="batch_form.php" class="add-new-button">Add New</a>
        </div>
    </div>
</body>
</html>
