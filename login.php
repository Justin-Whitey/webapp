<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'user_login';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();


if ($row = $result->fetch_assoc()) {

    if ($password === $row["password"]) {
        header("Location: front_page.html");
        exit;
    } else {
        echo "Invalid password";
        exit;
    }
} else {
    echo "User not found";
    exit;
}

$stmt->close();
$conn->close();
?>

