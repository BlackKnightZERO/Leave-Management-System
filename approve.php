<?php
include_once('connection.php'); 

session_start();
if (!isset($_SESSION['user_id'])) 
    {
      header('Location: signupin.php');
      exit;
  	}

	if(isset($_REQUEST['id']) || $_REQUEST['req_id']){
	$id = $_REQUEST['id'];
	$req_id = $_REQUEST['req_id'];
        echo $id;
		echo $req_id;
        }
        
        $sql = "UPDATE leaves SET status =0 WHERE `req_user_id`='$id' AND `id`=$req_id;";

        if (mysqli_query($conn, $sql)) {
       
            header('location:approveleavejunior.php');
        } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }

?>