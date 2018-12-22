<?php
include_once('connection.php'); 

session_start();
if (!isset($_SESSION['user_id'])) 
    {
      header('Location: signupin.php');
      exit;
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
		
		<?php
		$sql = "select users.user_name, leaves.* from  leaves left join users on leaves.req_user_id = users.id  WHERE leaves.status = 1";
		$result = mysqli_query($conn, $sql);

			if ($result->num_rows > 0) {
				echo "<div class = 'w3-container w3-margin-top'>
				<div class='w3-container w3-card-4 w3-white w3-round-xlarge'>
				  <h2>Request List:</h2>

				  <table class='w3-table w3-striped w3-border'>
				<tr>
				<th class='w3-light-grey'> Requested User </th> 
				<th class='w3-light-grey'> Start Date </th>
				<th class='w3-light-grey'> End Date </th>
				<th class='w3-light-grey'> Requested On </th>
				<th class='w3-light-grey'> Details </th>
				<th class='w3-light-grey'> Action </th>
				</tr>";
				// output data of each row
				
				
				while($row = $result->fetch_assoc()) 
						{
					echo "<tr align=center>
					
					<td>".$row["user_name"]."</td>
					<td>".$row["start_date"]."</td>
					<td>".$row["end_date"]."</td>
					<td>".$row["req_date"]."</td>
					<td>".$row["details"]."</td>
					<td><a class='w3-text-green' href='approve.php?id=".$row['req_user_id']."&req_id=".$row['id']."'>Approve</a>&nbsp</td>
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