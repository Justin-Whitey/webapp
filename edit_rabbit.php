<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "report_rabbit");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the URL
$id = $_GET['id'];

// Fetch the record from the database
$sql = "SELECT * FROM rabbit_expenses WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated values from the form
    $batch = $_POST['batch'];
    $type = $_POST['type'];
    $equipment = $_POST['equipment'];
    $vaccine = $_POST['vaccine'];
    $foods = $_POST['foods'];

    // Update the record in the database
    $update_sql = "UPDATE rabbit_expenses SET batch = ?, type = ?, equipment = ?, vaccine = ?, foods = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssdddi", $batch, $type, $equipment, $vaccine, $foods, $id);
    $update_stmt->execute();

    // Redirect back to the display page
    header("Location: rabbit_display.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Rabbit Expenses</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 {
            text-align: center;
            background-color: #800000;
            color: white;
            padding: 10px;
        }
        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
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
    <h1>Edit Rabbit Expenses</h1>
    <form method="POST">
        <label for="batch">Batch:</label>
        <input type="number" id="batch" name="batch" value="<?php echo htmlspecialchars($row['batch']); ?>" required>

        <label for="type">Type:</label>
        <input type="text" id="type" name="type" value="<?php echo htmlspecialchars($row['type']); ?>" required>

        <label for="equipment">Equipment Cost:</label>
        <input type="number" id="equipment" name="equipment" value="<?php echo htmlspecialchars($row['equipment']); ?>" step="0.01" required>

        <label for="vaccine">Vaccine:</label>
        <input type="number" id="vaccine" name="vaccine" value="<?php echo htmlspecialchars($row['vaccine']); ?>" step="0.01" required>

        <label for="foods">Foods:</label>
        <input type="number" id="foods" name="foods" value="<?php echo htmlspecialchars($row['foods']); ?>" step="0.01" required>

        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
