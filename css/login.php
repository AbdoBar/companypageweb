<?php
// Establish database connection
$servername = "localhost";
$username = "your_username"; // Replace with your database username
$password = "your_password"; // Replace with your database password
$dbname = "members_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$membership_number = $_POST['member-login-number'];
$password = $_POST['member-login-password'];

// Query to check user credentials
$sql = "SELECT * FROM members WHERE membership_number = '$membership_number' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User authenticated, redirect to dashboard or desired page
    header("Location: dashboard.php");
    exit();
} else {
    // Authentication failed, redirect back to login page with error message
    header("Location: login.html?error=1");
    exit();
}

$conn->close();
?>
