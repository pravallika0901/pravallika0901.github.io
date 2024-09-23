$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ex";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>authentication:<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your database connection details
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "csa4386";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username already exists
    $check_username_query = "SELECT * FROM login WHERE Username='$username' and Password='$password'";
    $result = $conn->query($check_username_query);
    if ($result->num_rows > 0) {
        echo "Authentication Verified";
        header('Location: Home.html'); 
        exit;
    } else {
        echo "Access Denied " . $check_username_query . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>