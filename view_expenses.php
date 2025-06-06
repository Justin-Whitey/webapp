<?php
$conn = new mysqli("localhost", "root", "", "full_report");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM hamster_expenses");

$total_equipment = 0;
$total_vaccine = 0;
$total_foods = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hamster Expenses Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 {
            text-align: center;
            background-color: #800000;
            color: white;
            padding: 10px;
        }
        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tfoot td {
            font-weight: bold;
            background-color: #d9d9d9;
        }
        .btn-link, .btn-action {
            padding: 5px 10px;
            background-color: #800000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 2px;
            display: inline-block;
        }
        .btn-link:hover, .btn-action:hover {
            background-color: #a00000;
        }
        .button-group {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>
    <h1>Hamster Expenses Report</h1>
    <table>
        <tr>
            <th>Batch</th>
            <th>Type</th>
            <th>Equipment Cost</th>
            <th>Vaccine</th>
            <th>Foods</th>
            <th>Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['batch']); ?></td>
            <td><?php echo htmlspecialchars($row['type']); ?></td>
            <td>₱<?php echo number_format($row['equipment_cost'], 2); ?></td>
            <td>₱<?php echo number_format($row['vaccine'], 2); ?></td>
            <td>₱<?php echo number_format($row['foods'], 2); ?></td>
            <td>
                <a class="btn-action" href="edit_exp.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn-action" href="delete_exp.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this entry?');">Delete</a>
            </td>
        </tr>
        <?php
            $total_equipment += $row['equipment_cost'];
            $total_vaccine += $row['vaccine'];
            $total_foods += $row['foods'];
        endwhile;
        ?>

        <tfoot>
            <tr>
                <td colspan="2">TOTAL</td>
                <td>₱<?php echo number_format($total_equipment, 2); ?></td>
                <td>₱<?php echo number_format($total_vaccine, 2); ?></td>
                <td>₱<?php echo number_format($total_foods, 2); ?></td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <div class="button-group">
        <a href="hamsterfrnt.html" class="btn-link">Back to Page</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
