<?php
$conn = new mysqli("localhost", "root", "", "full_report");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hamster_expenses";
$result = $conn->query($sql);

$total_equipment = 0;
$total_vaccine = 0;
$total_foods = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Expenses</title>
    <style>
        body { font-family: Arial; }
        h1 { text-align: center; background-color: #800000; color: white; padding: 10px; }
        table { width: 90%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 10px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Saved Expenses (Hamster)</h1>
    <table>
        <tr>
            <th>Batch</th>
            <th>Type</th>
            <th>Equipment</th>
            <th>Vaccine</th>
            <th>Foods</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) {
            $total_equipment += $row['equipment_cost'];
            $total_vaccine += $row['vaccine'];
            $total_foods += $row['foods'];
        ?>
            <tr>
                <td><?php echo $row['batch']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td>₱<?php echo number_format($row['equipment_cost'], 2); ?></td>
                <td>₱<?php echo number_format($row['vaccine'], 2); ?></td>
                <td>₱<?php echo number_format($row['foods'], 2); ?></td>
            </tr>
        <?php } ?>

        <tr>
            <th colspan="2">TOTAL</th>
            <th>₱<?php echo number_format($total_equipment, 2); ?></th>
            <th>₱<?php echo number_format($total_vaccine, 2); ?></th>
            <th>₱<?php echo number_format($total_foods, 2); ?></th>
        </tr>
    </table>
</body>
</html>

<?php $conn->close(); ?>
