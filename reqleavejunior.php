<?php
include_once('connection.php'); 

session_start();
if (!isset($_SESSION['user_id'])) 
    {
      header('Location: signupin.php');
      exit;
  	}
?>
<?php 
    if(isset($_POST['submit'])){

		if (empty($_POST['date_from']) || empty($_POST['date_to'])){

			$errorMassage='fild is empty! ';
		}
                else
                {   $start_date=$_POST['date_from'];
                    $end_date= $_POST['date_to'];
                    $details= $_POST['details'];
					$user_id=$_SESSION['user_id'];
					

      			$sql = "INSERT INTO leaves(req_user_id,app_user_id,start_date,end_date,req_date,details,status) VALUES('".$user_id."',1,'".$start_date."','".$end_date."',CURDATE(),'".$details."',1)";

				if (mysqli_query($conn, $sql)) {
				     $succ = "Leave Request Sent";
                                     
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
                        }
                }
     			
?>


<html>
<head>
<title>Leave Management</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/w3.css">
<style> 
        .bgimg 
		{
    background-image:url('./image/exams4.jpg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
        }
    .font 
	{
    font-family: "Comic Sans MS", cursive, sans-serif;
    }
</style>
</head>

<body class="bgimg">
        <ul class="w3-navbar w3-black">
        <li><a class="w3-blue" href="#"><?php echo $_SESSION['user_name']?> </a></li>
		<li><a href="#">Edit Profile</a></li>
		<li><a href="#" class='w3-text-blue'>Apply Leave here</a></li>
        <li class="w3-dropdown-hover w3-text-blue"><a href="#">F.A.Q<i class="fa fa-caret-down"></i></a>
            
			<div class="w3-dropdown-content w3-white w3-card-4">
                <a href="#" class='w3-blue'>How to apply</a>
                <a href="#" class='w3-light-blue'>Eligablility</a>
                <a href="#">About</a>
          </div>
        </li>
            
        
        <li class="w3-right w3-red"><a href="logout.php">Log Out</a></li>
    </ul>
        
        <div class="w3-container w3-center">
            <h1 class=" w3-animate-left w3-text-black">Welcome <?php echo $_SESSION['user_name'] ?></h1>
            <p class=" w3-animate-right w3-text-black"><?php if(($_SESSION['user_type'])=='1')
 {echo 'Senior Software Engineer';}
 else
 {
	 echo 'Junior Software Engineer';
 } ?></p>
  
 
          <!--img src="./image/avatar.png" width="5%"--> 
          <?php echo "<img src='./image/".$_SESSION['user_gender'].".png' width='5%'>"; ?>
         
        </div>
		<div class = 'w3-container w3-margin-top'>
		<div class = 'w3-half w3-container w3-padding-top'>
		
		
			<form class="w3-container w3-card-4 w3-light-grey  w3-round-xlarge" action="" method="post">
				  
					<div class = 'w3-container w3-row'>
					<h2 class = 'w3-text-indigo'>Apply Leave</h2>
							<div class = 'w3-container w3-half'>
						<h4>Leave from</h4>						 
						 <input type = 'date' name = 'date_from' class = 'w3-round-large'>
						  </div>
						  <div class = 'w3-container w3-half'>
							<h4>To</h4>
						  <input type = 'date' name ='date_to' class = 'w3-round-large'>
						</div> 
						
						
						<br><br>
						

			</div>
			
			<br><br>
		</div>
		
		<div class = 'w3-half w3-container w3-padding-top'>
		<div class="w3-container w3-card-4 w3-light-grey  w3-round-xlarge">
		<h2 class ='w3-text-indigo'>Details :</h2>
		
		  <p>      
		  <input class="w3-input w3-border-0 w3-round-xlarge" type="text" name = 'details'></p>
		  
		  <div class = 'w3-container w3-center w3-margin-top'>
							<p><input type="submit" class="w3-btn w3-round-xlarge w3-light-blue" name="submit" value="Request">
	  </p>
					</div>
		</div>
		
				</form>
        </div>
    </div>
	<br><br>
	
	<?php
		//$sql = "SELECT * FROM `leaves` WHERE status = 0 AND req_user_id = '".$_SESSION['user_id']."'";
		$sql = "SELECT * FROM `leaves` WHERE req_user_id = '".$_SESSION['user_id']."'";
		$result = mysqli_query($conn, $sql);

			if ($result->num_rows > 0) {
				echo "<div class = 'w3-container w3-margin-top'>
				<div class='w3-container w3-card-4 w3-white w3-round-xlarge'>
				  <h2>My List:</h2>

				  <table class='w3-table w3-striped w3-border'>
				<tr>
				<th class='w3-light-grey'> Requested On </th>
				<th class='w3-light-grey'> Start Date </th>
				<th class='w3-light-grey'> End Date </th>
				
				<th class='w3-light-grey'> Details </th>
				<th class='w3-light-grey'> Status </th>
				</tr>";
				// output data of each row
				
				
				while($row = $result->fetch_assoc()) 
						{
							if($row["status"]==0)
							{
								$var = "approved";
							}
							else
							{
								$var = "pending";
							}
							
					echo "<tr align=center>
					<td>".$row["req_date"]."</td>
					<td>".$row["start_date"]."</td>
					<td>".$row["end_date"]."</td>
					<td>".$row["details"]."</td>
					<td>".$var."</td>
					</tr>
					";
							
							
            }
			
            echo "</table>
				  <br>
				</div>";
			
            } else {
            echo "0 results";
            }
?> 
	
	<?php
         mysqli_close($conn);
        ?> 
    </body>
	<footer class="w3-container w3-bottombar w3-bottom w3-light-grey w3-opacity">
            <p1>copy right from : leave management system<a href="www.uiu.ac.bd">www.google.com</a></p1>
        </footer>


</html>