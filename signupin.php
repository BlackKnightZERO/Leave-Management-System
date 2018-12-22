<?php include_once("connection.php"); ?>



<?php 
    if(isset($_POST['submit1'])){

		if (empty($_POST['user_name1']) || empty($_POST['password1'])){

			$errorMassage='fild is empty! ';
		}
                else
                {   $user_name=$_POST['user_name1'];
                    $pass = $_POST['password1'];
					

      			$sql = " SELECT COUNT(*) FROM users WHERE( user_name='".$user_name."'AND password='".$pass."') ";

				$qury = mysqli_query($conn, $sql);

				$result = mysqli_fetch_array($qury);
			
				if($result[0]>0)
                    {
						
                    $sessionSql = " SELECT id,user_name,password,type,gender FROM users WHERE ( user_name='".$user_name."' AND password='".$pass."') ";
					$sessionQury = mysqli_query($conn, $sessionSql);
					
					while($sessionResult = mysqli_fetch_array($sessionQury, MYSQLI_BOTH))
					{
						
						 $u_id = $sessionResult['id'];
						 $u_name = $sessionResult['user_name'];
						 $u_type = $sessionResult['type'];
						 $u_gender = $sessionResult['gender'];
						 
						 
					}
					
					session_start();
					
					$_SESSION['user_id'] = $u_id;
					$_SESSION['user_name'] = $u_name;
					$_SESSION['user_type'] = $u_type;
					$_SESSION['user_gender'] = $u_gender;
					
					
					
					
					if($u_type == 2)
					{header('location: reqleavejunior.php');}
				
					if($u_type == 1)
					{header('location: approveleavejunior.php');}
				
					exit;				
                    }
                else
                {
                $errorMassage=' Invalid User Name or Password ';
                }
            }
        }
     			
?>


<?php
$errorMassage ="";
$succ = "";
$emailErr="";
$u_id="";
if(isset($_POST['submit'])){

		if (empty($_POST['user_name']) || empty($_POST['password']) || empty($_POST['mail']) || empty($_POST['phone']) ||  empty($_POST['gender']) || empty($_POST['type'])) {

			$errorMassage='fild is empty! ';
		}
                else{
                    
                    $mail = $_POST['mail'];
			

			if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
                                {
                                $emailErr = 'Invalid email format'; 
                                }
                        else{            
						$name = $_POST['user_name'];
                        $password=$_POST['password'];
                        $phone = $_POST['phone'];
                        $sex = $_POST['gender'];
						$type = $_POST['type'];
			

			$sql = "INSERT INTO users (user_name, password, type, phone, mail, supervisor,gender)
				VALUES ('".$name."','".$password."','".$type."','".$phone."','".$mail."',1,'".$sex."')";

				if (mysqli_query($conn, $sql)) {
				     $succ = "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
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
    background-image:url('./image/leaveindex2copy.jpg');
    background-size: 154% 100%;
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
        <li><a class="w3-blue" href="index.php"> Home </a></li>
		<li><a href="#" class='w3-text-blue'>Apply Leave here</a></li>
        <li class="w3-dropdown-hover w3-text-blue"><a href="#">F.A.Q<i class="fa fa-caret-down"></i></a>
            
			<div class="w3-dropdown-content w3-white w3-card-4">
                <a href="#" class='w3-blue'>How to apply</a>
                <a href="#" class='w3-light-blue'>Eligablility</a>
                <a href="#">About</a>
          </div>
        </li>
    
    </ul>      
	
	<div class="w3-container w3-cyan w3-card-4 w3-half w3-margin-top">
  <h2>Sign In</h2>
</div>
	<div class = 'w3-container w3-half w3-margin-top'>
	<form class="w3-container w3-card-4 w3-round-xlarge" action="" method="post">
	  <p>
	  <label>User Name</label>
	  <input class="w3-input w3-round-large" type="text" name="user_name1" required></p>
	  <p>
	  <label>Password</label>
	  <input class="w3-input w3-round-large" type="password" name="password1" required></p>
	  <p>
	  
	   <p class = 'w3-center'>
	  <input type="submit" class="w3-btn w3-round-xlarge w3-green" name="submit1" value="Log In">
	  </p>
	</form>
      </div>
	  
	  
 <div class="w3-container w3-indigo w3-card-4 w3-half w3-margin-top">
  <h2>Sign Up</h2>
</div>
	<div class = 'w3-container w3-half w3-margin-top'>
	<form class="w3-container w3-card-4 w3-round-xlarge" action="" method="post">
	  <p>
	  <label>User Name</label>
	  <input class="w3-input w3-round" type="text" name = 'user_name' required></p>
	  <p>
	  <label>Password</label>
	  <input class="w3-input w3-round" type="password" name = 'password'required></p>
	  <p>
	  <label>Email</label>
	  <input class="w3-input w3-round" type="text" name = 'mail' required></p>
	  <label>Contact</label>
	  <input class="w3-input w3-round" type="text" name ='phone' required></p>
	  <p>
	  <label>Gender</label></br>
	  <input class="w3-radio" type="radio" name="gender" value="male" checked>
		<label>Male</label>

		<input class="w3-radio" type="radio" name="gender" value="female">
		<label>Female</label>

		<input class="w3-radio" type="radio" name="gender" value="" disabled>
		<label>Alien</label>
	  </p>
	  <p>
	  <label>Enrol As<label>
	  </p>
	  <p>
	  <select class="w3-select w3-round" name="type">
		<option value="" disabled selected>Type</option>
    <option value="1">Senior Software Engineer</option>
    <option value="2">Junior Software Engineer</option>
    <option value="3">Internee</option>
		</select>
	  </p>
	  <p class = 'w3-center'>
	  <input type="submit" name = 'submit' class="w3-btn w3-green w3-round-xlarge" value="Sign Up">
	  </p>
	</form>
      </div>
	  <?php
         mysqli_close($conn);
        ?>   
    </body>
	<footer class="w3-container w3-bottombar w3-bottom w3-light-grey w3-opacity">
            <p1>copy right from : leave management system<a href="www.uiu.ac.bd">www.google.com</a></p1>
        </footer>


</html>