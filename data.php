<?php
// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "BB@dev@41833"; // Replace with your password
$dbname = "golden_banquet"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Check if data is sent via POST
if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['event'], $_POST['date'], $_POST['message'])) {
    // Get the data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event = $_POST['event'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    // Step 3: Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO events (name, email, phone, event_type, event_date, message) VALUES (?, ?, ?, ?, ?, ?)");

    // Check if preparation is successful
    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }

    // Bind the parameters (s for string type, i for integer, etc.)
    $stmt->bind_param("ssssss", $name, $email, $phone, $event, $date, $message);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New event record created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Step 4: Close the statement and connection
    $stmt->close();
} else {
    echo "Error: Data not submitted properly.";
}

// Close the connection
$conn->close();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}`
?>