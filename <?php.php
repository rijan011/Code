<?php
// Step 1: Connect to the database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "golden_banquet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Get the data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Step 3: Insert the data into the table
$sql = "INSERT INTO your_table_name (name, email, message)
        VALUES ('$name', '$email', '$message')";

// Check if the insert is successful
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Step 4: Close the connection
$conn->close();
?>