<?php
$conn = new mysqli("localhost", "root", "", "full_report");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM hamster_expenses WHERE id = $id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Expense</title>
    <style>
        body { font-family: Arial; }
        h1 {
            text-align: center;
            background-color: #800000;
            color: white;
            padding: 10px;
        }
        form {
            width: 50%;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #000;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }
        button {
            padding: 10px 20px;
            background-color: #800000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #a00000;
        }
    </style>
</head>
<body>
    <h1>Edit Hamster Expense</h1>
    <form action="update_exp.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Batch</label>
        <input type="number" name="batch" value="<?php echo $row['batch']; ?>" required>
        <label>Type</label>
        <input type="text" name="type" value="<?php echo $row['type']; ?>" required>
        <label>Equipment Cost</label>
        <input type="number" step="0.01" name="equipment_cost" value="<?php echo $row['equipment_cost']; ?>" required>
        <label>Vaccine</label>
        <input type="number" step="0.01" name="vaccine" value="<?php echo $row['vaccine']; ?>" required>
        <label>Foods</label>
        <input type="number" step="0.01" name="foods" value="<?php echo $row['foods']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
