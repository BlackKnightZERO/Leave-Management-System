<?php
include_once('connection.php'); 
/*
session_start();
if (!isset($_SESSION['user_id'])) 
    {
      header('Location: signupin.php');
      exit;
  	}
	*/
?>
<!--?php 
    if(isset($_POST['submit'])){

		if (empty($_POST['$var1']) || empty($_POST['$var3'])){

			$errorMassage='fild is empty! ';
		}
                else
                {   $a_var1=$_POST['$var1'];
                    $a_var3= $_POST['$var3'];
					
			$sql = "UPDATE users SET `supervisor` = $a_var3 WHERE `id` = $a_var1";

				if (mysqli_query($conn, $sql)) {
				     $succ = "Leave Request Sent";
                                     
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
                        }
                }
     			
?-->

<html>
<head>
<title>Leave Management</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/w3.css">
<style> 
        .bgimg 
		{
    background-image:url('./image/blue.jpg');
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
        <li><a class="w3-blue" href="#"></a></li>
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
	
	
	
	<div class = 'w3-container w3-padding-top'>
			<form class="w3-container w3-card-4 w3-light-grey  w3-round-xlarge" action="" method="post">	  
					<div class = 'w3-container w3-row'>
					<h2 class = 'w3-text-indigo'>Assign Supervisor</h2>
							<div class = 'w3-container w3-half'>
						<h4>User</h4>						 
						 <p>
							 <select class="w3-select w3-round" name="type">
							 
							 <?php 
							 $sql = "SELECT * FROM `users` WHERE type = 2";
							 $result = mysqli_query($conn, $sql);
							if ($result->num_rows > 0) 
							{
								while($row = $result->fetch_assoc()) 
								{				$var1=$row["id"];
												$var2=$row["user_name"];
								echo "<option value='".$var1."'>".$var2."</option>";
								}
							}
							?>
						</select>
						</p>
						  </div>
						  <div class = 'w3-container w3-half'>
							<h4>Supervisor</h4>
								<p>
							 <select class="w3-select w3-round" name="type">
							 <?php 
							 $sql = "SELECT * FROM `users` WHERE type = 1";
							 $result = mysqli_query($conn, $sql);
							if ($result->num_rows > 0) 
							{
								while($row = $result->fetch_assoc()) 
								{				$var3=$row["id"];
												$var4=$row["user_name"];
								echo "<option value='".$var3."'>".$var4."</option>";
								}
							}
							?>
						</select>
						</p>
						</div> 
						<br><br>
						</div>	
						<p class = 'w3-center'>
						<input type="submit" name = 'submit' class="w3-btn w3-green w3-round-xlarge" value="Assign">
						</p>
</form>						
			<br><br>
		</div>
		
		<?php
		if(isset($_POST['submit'])){
			echo ($_POST($var1));
			echo ($_POST($var3));
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