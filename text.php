<?php 
include_once('connection.php'); 

							 $sql = "SELECT * FROM `users` WHERE type = 2";
							 $result = mysqli_query($conn, $sql);

							if ($result->num_rows > 0) 
							{
								while($row = $result->fetch_assoc()) 
								{
								echo $row["user_name"];
							 echo " ";
								}
							}
							exit;
?>