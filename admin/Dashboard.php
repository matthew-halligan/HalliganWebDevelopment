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
       
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "harryptt_CS142Final";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);*/
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

$sql = "SELECT pmkContactId, fldFirstName, fldLastName, fldEmail, fldComments FROM tblContactPage WHERE status = 1";
$records = $db->query($sql);

$isAdmin = true;



$result = $db->query($sql);

print '<span>Welcome '.$_SESSION['admin_username'].'</span> <a href="logout.php" >logout</a>';
print '<h3>List Of People That Have Filled Out Our Form</h3>';
print '<table>';
    print '<thead>';
        print'<tr>';
            print'<th scope="col">First Name</th>';
            print'<th scope="col">Last Name</th>';
            print'<th scope="col">Email</th>';
            print'<th scope="col">Question/Comments</th>';
            print'<th scope="col">Status</th>';
            print'<th scope="col">Ignore</th>';
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
                        //print '<td><a href="mailto:'; 
                        //print  $row["fldEmail"] . '">Reply</a></td>';
                        //print '<td><a href="/'; 
                        //print  $row["fldEmail"] . '">Reply</a></td>';
                        echo '<td><a data-contact-id="'.$row["pmkContactId"].'" data-contact-message="'.$row["fldComments"].'" href="#" data-toggle="modal" data-target="#myModal" class="open-AddBookDialog">Reply</a>';
                        echo '<td><a data-contact-id="'.$row["pmkContactId"].'"  href="#" class="remove-contact">Ignore</a></td>';
                    print '</tr>';
            
    }
    print'</tbody>'; 
    print '</table>';
} else {
    echo "0 results";
}

$conn->close();
    //}
//}
?>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
     <form name="fmrreplymessage" id="fmrreplymessage">    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New Message</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="form-group">
            <label for="FormControlmessage">New Message</label>
            <textarea readonly="true" class="form-control" id="FormControlmessage" rows="3"></textarea >
          </div>

      <div class="form-group">
        <label for="FormControlreply">Reply</label>
        <textarea class="form-control" name="reply_message" id="FormControlreply" rows="3" required="true"></textarea>
      </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="hidden" name="contactid" id="contactid" value=""  />
        <input type="hidden" name="action" value="contactreply"  />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Send</button>
      </div>
     </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    var url = <?php echo ADMIN_PATH; ?>
    $('#myModal').on('shown.bs.modal', function (e) {
      var bookId = $(e.relatedTarget).data('contact-id');
      var message = $(e.relatedTarget).data('contact-message');

     $('#contactid').val(bookId);
     $('#FormControlmessage').html(message);
      
    });

    $('#myModal').on('hidden.bs.modal', function () {
        $('#contactid').val("");
        $('#FormControlmessage').html("");
    });

    $(document).on('submit','#fmrreplymessage',function(){
       
      formdata = $(this).serialize();
      $.ajax('ajax.php', {
            type: 'POST',  // http method
            data: formdata,
            success: function (data, status, xhr) {
                if(data == 'okay'){
                  window.location.href = url;
                }
            },
            error: function (jqXhr, textStatus, errorMessage) {
                alert(errorMessage);
            }
        });
      return false;
    });
   
   $(document).on('click',".remove-contact", function(){
        
        var r = confirm("Are you want to delete this message");
        if (r == true) {
          txt = "Yes";
          var contactid = $(this).data('contact-id');
          $.ajax('ajax.php', {
            type: 'POST',  // http method
            data: { action: 'deletecontact', contactid: contactid },  // data to submit
            success: function (data, status, xhr) {
                if(data == 'okay'){
                    window.location.href = url;
                }
            },
            error: function (jqXhr, textStatus, errorMessage) {
                alert(errorMessage);
            }
        });

        } else {
          txt = "Cancel";
        }
   });
</script>
</body>