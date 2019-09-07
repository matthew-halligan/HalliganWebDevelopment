<!-- 
THIS IS WHERE I PUT THE PASSWORD ENTRY TO GET ACCESS TO ADMIN DASHBOARD
IF YOU ENTER THE PASSWORD CORRECTLY INTO THE FORM, IT WILL DISPLAY THE ADMIN DASHBOARD
THE PASSWORD IS ON LINE 46 AND YOU CAN CHANGE IT TO BE WHATEVER YOU WANT -->
<!-- <h1>Enter in the Admin Password</h1>
<form method="post" action="">
<input type="text" name="value">
<input type="submit">
</form> -->
<?php include('security.php'); ?>

<?php 
require_once('../config.php');

$edit_user_id = 0;
$stitle = '';
$scontent = '';
$simage = '';

if(!empty($_GET['id']))
{
  $edit_user_id = $_GET['id'];
  $sql = "SELECT * FROM tblposts WHERE id = ".$edit_user_id." AND status = 'publish'";
  
  $records = $db->query($sql);
  if($records->num_rows > 0){

        $row = $records->fetch_assoc();
        $stitle = $row['title']; 
        $scontent = $row['content'];
        $simage = $row['image'];


  }else{
    header("location: pages.php");
    exit;
  }
}

if(isset($_POST["save"]))
{
    
    $title = mysqli_real_escape_string($db, $_POST['title']);  
    $content = mysqli_real_escape_string($db, $_POST["content"]);   
    $status = 'publish';      
    $slug = '';

    if(isset($_FILES['featured_image'])){
          $errors= array();
          $file_name = $_FILES['featured_image']['name'];
          $file_size =$_FILES['featured_image']['size'];
          $file_tmp =$_FILES['featured_image']['tmp_name'];
          $file_type=$_FILES['featured_image']['type'];
          $file_ext=strtolower(end(explode('.',$_FILES['featured_image']['name'])));
          
          $extensions= array("jpeg","jpg","png");
          
          if(in_array($file_ext,$extensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
          
          if($file_size > 2097152){
             $errors[]='File size must be excately 2 MB';
          }
          
          if(empty($errors)==true){
             move_uploaded_file($file_tmp,"../media/".$file_name);
             $media = $file_name;
          }else{
            $media = '';
          }
          $imgewhere = " , image = '".$media."'";
    }else{
        $imgewhere = '';
    }

    if(!empty($edit_user_id)){
        $sql = "UPDATE tblposts SET tblposts.title = '".$title."'  , content = '".$content."' ".$imgewhere." WHERE id='".$edit_user_id."'";
       
    }else{

         $sql = "INSERT INTO tblposts (title, slug, content, status,image)
VALUES ('". $title ."', '". $slug ."', '". $content ."', '". $status ."', '".$media."')";
    }
   

if ($db->query($sql) === TRUE) {
    header("location: pages.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <title>Edit Page</title>
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
  <script src="../js/jquery.validate.min.js"></script>
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
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

$sql = "SELECT * FROM tblposts WHERE status = 'publish'";
$records = $db->query($sql);

$isAdmin = true;

$result = $db->query($sql);

if($edit_user_id){
    $edit_text = 'Edit Post';
}else{
     $edit_text = 'New post';
}

?>
<div class="page">
    <div class="page-header">
        <h2 class="page-title"><?php echo $edit_text; ?></h2>        
    </div>   
<form action="" method="post" name="formPage" enctype="multipart/form-data">

  <div class="form-group row">
    <label for="staticId" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticId" value="<?php echo $edit_user_id ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $stitle; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="content" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea name="content" rows="10" cols="100"><?php echo $scontent; ?></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="featured_image" class="col-sm-2 col-form-label">Featured Image</label>
    <div class="col-sm-10">
        <label for="exampleFormControlFile1">&nbsp;</label>
      <input type="file" name="featured_image" class="form-control-file" id="featured_image">
      <?php if(!empty($simage)){ ?>
        <img src="../media/<?php echo $simage; ?>" width="300">
      <?php } ?>
    </div>
  </div>
    <input type="hidden" name="blog_id" value="">
   <button type="submit" class="btn btn-primary" name="save">Save</button>
   <a href="pages.php" class="btn btn-danger">Cancel</a>
</form>
</div>
<script type="text/javascript">
    $(function() {
  
      $("form[name='formPage']").validate({
    
        rules: {
          title: "required"
        },
        // Specify validation error messages
        messages: {
          title: "Please enter Title",
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        /*submitHandler: function(form) {
          form.submit();
        }*/
      });
    });
</script>
</body>