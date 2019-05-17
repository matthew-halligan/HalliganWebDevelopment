<!DOCTYPE html>
<html lang="en">

<head>
        <title>TSN Industries</title>
        <meta charset="utf-8">
        <meta name="author" content="Andres Salcedo, Nana Nimako, Prasidha Timsina">
        <meta name="description" content="A web desing company that has all you need.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap  Link -->
        <!-- Bootstrap Received from: https://getbootstrap.com/docs/4.1/getting-started/introduction/ -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
                 <!-- Bootstrap core CSS -->
                <link href="css/bootstrap.min.css" rel="stylesheet">
                <!-- Material Design Bootstrap -->
                <link href="css/mdb.min.css" rel="stylesheet">
                <!-- Your custom styles (optional) -->
                <link href="css/style.css" rel="stylesheet">
    
    
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		<!-- End Bootstrap  Link -->

		<!-- Footer Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- End of Footer Icons -->
        <link rel="stylesheet" href="custom.css">

</head>

<body>
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

$sql = "SELECT pmkContactId, fldFirstName, fldLastName, fldEmail, fldComments FROM tblContactPage";
$records = $conn->query($sql);

$isAdmin = true;


$result = $conn->query($sql);

print '<span>Welcome</span>';
print '<h3>List Of People That Have Filled Out Our Form</h3>';
print '<table>';
    print '<thead>';
        print'<tr>';
            print'<th scope="col">First Name</th>';
            print'<th scope="col">Last Name</th>';
            print'<th scope="col">Email</th>';
            print'<th scope="col">Question/Comments</th>';
            print'<th scope="col">Status</th>';
        print'</tr>';
    print'</thead>';



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        print '<tbody>';
                    print '<tr>';
                        print '<td>' . $row["fldFirstName"] .'</td>';
                        print '<td>' . $row["fldLastName"] .'</td>';
                        print '<td>' . $row["fldEmail"] .'</td>';
                        print '<td>' . $row["fldComments"] .'</td>';
                        print '<td><a href="mailto:'; 
                        print  $row["fldEmail"] . '">Reply</a></td>';
                    print '</tr>';
            
    }
    print'</tbody>'; 
    print '</table>';
} else {
    echo "0 results";
}


$conn->close();
?>

</body>