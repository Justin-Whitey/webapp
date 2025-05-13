<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Expenses (Rabbit)</title>
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
            max-width: 600px;
            margin: 0 auto;
            color: black;
        }
        h1 {
            color: #c0392b;
            text-align: center;
        }
        label {
            font-weight: bold;
            color: #2c2c2c;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }
        button, .btn-link {
            padding: 10px 20px;
            background-color: #c0392b;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover, .btn-link:hover {
            background-color: #a93226;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Expenses (Rabbit)</h1>
        <form action="save_rabbit.php" method="POST">
            <label for="batch">Batch</label>
            <input type="number" id="batch" name="batch[]" min="1" required>

            <label for="type">Breed</label>
            <input type="text" id="type" name="type[]" required>

            <label for="equipment">Equipment Cost</label>
            <input type="number" id="equipment" name="equipment[]" step="0.01" required>

            <label for="vaccine">Vaccine Cost</label>
            <input type="number" id="vaccine" name="vaccine[]" step="0.01" required>

            <label for="foods">Food Cost</label>
            <input type="number" id="foods" name="foods[]" step="0.01" required>

            <div class="button-container">
                <a href="rabbitfrnt.html" class="btn-link">Back</a>
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
