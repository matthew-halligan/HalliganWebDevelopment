<!-- 
THIS IS WHERE I PUT THE PASSWORD ENTRY TO GET ACCESS TO ADMIN DASHBOARD
IF YOU ENTER THE PASSWORD CORRECTLY INTO THE FORM, IT WILL DISPLAY THE ADMIN DASHBOARD
THE PASSWORD IS ON LINE 46 AND YOU CAN CHANGE IT TO BE WHATEVER YOU WANT -->
<!-- <h1>Enter in the Admin Password</h1>
<form method="post" action="">
<input type="text" name="value">
<input type="submit">
</form> -->
<?php 

include('../config.php'); 
include('security.php');


?>
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
                <link href="../css/bootstrap.min.css" rel="stylesheet">
                <!-- Material Design Bootstrap -->
                <link href="../css/mdb.min.css" rel="stylesheet">
                <!-- Your custom styles (optional) -->
                <link href="../css/style.css" rel="stylesheet">
    
    
		<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		<!-- End Bootstrap  Link -->

		<!-- Footer Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- End of Footer Icons -->
        <link rel="stylesheet" href="../custom.css">

</head>

<body>

<?php
//echo $_POST['value'];
$userPassword = 1234;
//if(!empty($_POST['value'])){

//if ($_POST['value'] == $userPassword) {
       

/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "harryptt_CS142Final";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);*/
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

$sql = "SELECT * FROM tblposts WHERE status = 'publish'";
$records = $db->query($sql);

$isAdmin = true;

$result = $db->query($sql);

print '<span>Welcome</span>';
print '<h3>List Of Blogs</h3>';
echo '<a href="page.php" class="btn btn-danger">Add New</a>';
print '<table>';
    print '<thead>';
        print'<tr>';
            print'<th scope="col">ID</th>';
            print'<th scope="col">Title</th>';
            //print'<th scope="col">slug</th>';
            print'<th scope="col">Content</th>';
            print'<th scope="col">Status</th>';
            print'<th scope="col">Action</th>';
        print'</tr>';
    print'</thead>';



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        print '<tbody>';
        print '<tr>';
            print '<td>' . $row["id"] .'</td>';
            print '<td>' . $row["title"] .'</td>';
            //print '<td>' . $row["title"] .'</td>';
            print '<td>' . substr(strip_tags($row["content"]),0,50).'..' .'</td>';
            print '<td>' . $row["status"] .'</td>';
      
            echo '<td><a href="page.php?id='.$row["id"].'">Edit</a></td>';
        print '</tr>';
            
    }
    print'</tbody>'; 
    print '</table>';
} else {
    echo "0 results";
}

$db->close();
    //}
//}
?>

</body>