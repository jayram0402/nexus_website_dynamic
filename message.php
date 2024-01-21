<?php
// Establish a connection to the database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bot";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the user input
$userInput = $_POST['text'];

// Perform a database query to get the reply
$query = "SELECT replay FROM chatbot WHERE text = '$userInput'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output the reply if found
    $row = $result->fetch_assoc();
    echo $row['replay'];
} else {
    // Output a default message if no reply is found
    echo "I'm sorry, I don't understand that.";
}

$conn->close();
?>
