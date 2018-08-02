<?php 

	include 'dbconfig.php';

?>
<html>

	<head>
	
		<title></title>
		
		<link rel="stylesheet" href=".\changePassword.css">
	
	</head>
	
	<body>
	
		<header>
		
            <div class="container">
			
				<a href=".\home.php"> <div class="sub-head" id="sub-head1">HOME</div> </a>
                <a href="#"> <div class="sub-head" id="sub-head2">PLANS</div> </a>
                <a href="#"> <div class="sub-head" id="sub-head3">FIND A STORE</div> </a>
                <a href="#"> <div class="sub-head" id="sub-head4">SUPPORT</div> </a>
                <a href=".\login.php"> <div class="sub-head" id="sub-head5">SIGN IN</div> </a>
                <a href=".\register.php"> <div class="sub-head" id="sub-head6">SIGN UP</div> </a>
					
            </div>
				
        </header>
		
		<div id="change-pssd"><h1>Change your password</h1></div>
		
		<div id="wrapper">
		
			<a href=".\login.php">
			
				<img src=".\arrow.png">
				
			</a>
		
			<?php
			
				if(array_key_exists('mobno', $_POST) OR array_key_exists('password', $_POST) OR array_key_exists('newpassword', $_POST)) {
			
					if($_POST['mobno'] == '') {
			
			?>
			
			<p id="p1" style="display:none">Mobile Number is required!</p>
				
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p1').style.display = 'block';</script>";
					
				}else if($_POST['currentpassword'] == '') {
			
			?>
			
			<p id="p2">Current Password is required!</p>
				
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p2').style.display = 'block';</script>";
						
				}else if($_POST['newpassword'] == ''){
					
			?>
			
			<p id="p3" style="display:none">New Password is required!</p>
			
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p3').style.display = 'block';</script>";
						
				}else {
					
					$query = "SELECT Password FROM `user_info` WHERE Mob_No = '".$_POST['mobno']."'";
					
					$result = mysqli_query($link, $query);
					
					$row = mysqli_fetch_assoc($result);
					
					if($row['Password'] == $_POST['currentpassword']) {
						
						$mobNoAgain = $_POST['mobno'];
						$newPassword = $_POST['newpassword'];
						
						$query = "UPDATE `user_info` SET Password = '".$newPassword."' WHERE Mob_No = '".$mobNoAgain."'";
						
						mysqli_query($link, $query);
						
						echo "<script type='text/javascript'>alert('Password Changed Successfully');</script>";
						
					}else {
			
			?>
			
			<p id="p3" style="display:none">Mobile Number and Current Password do not match!</p>
			
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p3').style.display = 'block';</script>";
				
				}
						
				}
					
				}
			
			?>
				
				<form method="POST">
					
					<input type="text" name="mobno" placeholder="Enter Mobile Number">
								
					<input type="password" name="currentpassword" placeholder="Enter Current Password">
					
					<input type="password" name="newpassword" placeholder="Enter New Password">
									
					<input type="submit" name="changepassword" value="Change Password" id="changePasswordButton">
					
				</form>			
		
		</div>
		
		<div id="last-id">
		
				<div class="col">
			  <h2>Our Offerings</h2>
			  <ul>
				<li><a href="#">Plans</a></li>
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