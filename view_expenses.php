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
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            background-color: #800000;
            color: white;
            padding: 10px;
        }
        table {
            width: 90%;
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
        .btn-link {
            display: block;
            width: fit-content;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #800000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-link:hover {
            background-color: #a00000;
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
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['batch']); ?></td>
            <td><?php echo htmlspecialchars($row['type']); ?></td>
            <td>₱<?php echo number_format($row['equipment_cost'], 2); ?></td>
            <td>₱<?php echo number_format($row['vaccine'], 2); ?></td>
            <td>₱<?php echo number_format($row['foods'], 2); ?></td>
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
            </tr>
        </tfoot>
    </table>

    <a href="hamsterform.html" class="btn-link">Back to Form</a>
</body>
</html>

<?php
$conn->close();
?>
