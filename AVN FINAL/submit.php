<?php
// Database connection parameters
$servername = "localhost"; // Change if your DB is hosted elsewhere
$username = "root"; // Your MySQL username
$password = "nishanth"; // Your MySQL password
$dbname = "mydatabase"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$number1= $_POST['number1'];
$number2= $_POST['number2'];


// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, email, number1, number2) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $number1, $number2);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>