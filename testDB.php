<?php
$servername = "localhost";
$username = "harryptt_142user";
$password = "142user";
$dbname = "harryptt_CS142Final";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//this is the code to change in order to test new sql functions
$sql = "INSERT INTO tblContactPage (fldFirstName, fldLastName, fldEmail, fldComments)
VALUES ('pra', 'timsina', 'testprasidhatimsina@gmail.com', 'Lets hang!')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>