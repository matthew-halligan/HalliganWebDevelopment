<?php

require_once('../config.php');
$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : '';

if($action == 'deletecontact'){

  $id = $_POST['contactid'];
  $sql = "UPDATE tblcontactpage SET status='-1' WHERE pmkContactId='".$id."'";

  if ($db->query($sql) === TRUE) {
      echo "okay";
  } else {
      echo "";
  }
}else if($action == 'contactreply'){

  $id = $_POST['contactid'];
  $message = $_POST['reply_message'];
  $sql = "UPDATE tblcontactpage SET reply_message='".$message."' AND reply_status = 1 WHERE pmkContactId='".$id."'";

  if ($db->query($sql) === TRUE) {
      echo "okay";
  } else {
      echo "";
  }

}else{
  echo '0';
}