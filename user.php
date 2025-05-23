<?php
$host = 'localhost';
$dbname = 'user_login';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Error preparing statement: ' . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        header("Location: homepage.html");
        exit();
    } else {
        echo "<script>alert('The email or password you entered is incorrect.'); window.location.href = 'log_in.php';</script>";
    }
} else {
    echo "<script>alert('The email or password you entered is incorrect.'); window.location.href = 'log_in.php';</script>";
}

$stmt->close();
$conn->close();
?>
