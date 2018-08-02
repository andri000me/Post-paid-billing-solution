<?php

	session_start();

	include 'dbconfig.php';
	
?>

<html>

	<head>
	
		<title>Login</title>
		
		<link rel="stylesheet" href=".\login.css">
		
	</head>
	
	<body>
	
		<header>
		
            <div class="container">
			
                <a href=".\home.php"> <div class="sub-head" id="sub-head1">HOME</div> </a>
                <a href=".\plans.php"> <div class="sub-head" id="sub-head2">PLANS</div> </a>
                <a href="#"> <div class="sub-head" id="sub-head3">FIND A STORE</div> </a>
                <a href=".\support.php"> <div class="sub-head" id="sub-head4">SUPPORT</div> </a>
                <a href=".\login.php"> <div class="sub-head" id="sub-head5">SIGN IN</div> </a>
                <a href=".\register.php"> <div class="sub-head" id="sub-head6">SIGN UP</div> </a>
					
            </div>
				
        </header>
		
		<div id="sign-in"><h1>Login to your account</h1></div>
		
		<div id="wrapper">
		
		<?php
		
			if(array_key_exists('mobno', $_POST) OR array_key_exists('password', $_POST)) {
		
				if($_POST['mobno'] == '') {
		
		?>
		
		<p id="p1" style="display:none">Mobile Number is required!</p>
			
		<?php
		
			echo "<script type='text/javascript'>document.getElementById('p1').style.display = 'block';</script>";
				
			}else if($_POST['password'] == '') {
		
		?>
		
		<p id="p2">Password is required!</p>
			
		<?php
		
			echo "<script type='text/javascript'>document.getElementById('p2').style.display = 'block';</script>";
					
			}else {
					
				$query = "SELECT * FROM `user_info`";
					
				$result = mysqli_query($link, $query); 
					
				while($row = mysqli_fetch_assoc($result)) {
					
					
					$mobNo = $row['Mob_No'];
					$Password = $row['Password'];
						
					if($mobNo == $_POST['mobno'] & $Password == $_POST['password']) {
						
						$_SESSION['mobSession'] = $row['Mob_No'];
						header("Location: .\home.php");
							
					}
						
				}
				
		?>
		
		<p id="p3" style="display:none">Mobile Number and Password do not match!</p>
		
		<?php
		
			echo "<script type='text/javascript'>document.getElementById('p3').style.display = 'block';</script>";
					
			}
				
			}
		
		?>
		
			<form method="POST">
				
				<input type="text" name="mobno" placeholder="Mobile Number">
							
				<input type="password" name="password" placeholder="Password">
								
				<input type="submit" name="login" value="Login" id="loginButton">
				
			</form>
			
			<a href=".\changePassword.php"><p>Change Password?</p></a>
			
		
		</div>
		
		<div id="last-id">
		
				<div class="col">
			  <h2>Our Offerings</h2>
			  <ul>
				<li><a href=".\plans.php">Plans</a></li>
			  </ul>
			</div>
			<div class="col">
			  <h2>Support</h2>
			  <ul>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="#">Find a store</a></li>
			  </ul>
			</div>
			<div class="col">
			  <h2>Our Company</h2>
			  <ul>
				<li><a href="#'">Why our company</a></li>
			  </ul>
			</div>
			<div class="col">
			  <h2>Legal</h2>
			  <ul>
				<li><a href="#">Terms and Conditions</a></li>
				<li><a href="#">Policies</a></li>
				<li><a href="#">Regulatory</a></li>
			  </ul>
			</div>
			
			</div>
	
	</body>

</html>