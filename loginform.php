<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname="loginform";
$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $sql = "INSERT INTO booking (Username, Password) VALUES ('$username','$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<script>div('booking');</script>"; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close()
?>