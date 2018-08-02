<?php 

	include 'dbconfig.php';

?>
<html>

	<head>
	
		<title></title>
		
		<link rel="stylesheet" href=".\register.css">
	
	</head>
	
	<body>
	
		<header>
		
            <div class="container">
			
                <a href=".\home.php"> <div class="sub-head" id="sub-head1">HOME</div> </a>
                <a href=".\plans.php"> <div class="sub-head" id="sub-head2">PLANS</div> </a>
                <a href="#"> <div class="sub-head" id="sub-head3">FIND A STORE</div> </a>
                <a href="#"> <div class="sub-head" id="sub-head4">SUPPORT</div> </a>
                <a href=".\login.php"> <div class="sub-head" id="sub-head5">SIGN IN</div> </a>
                <a href=".\register.php"> <div class="sub-head" id="sub-head6">SIGN UP</div> </a>
					
            </div>
				
        </header>
		
		<div id="sign-up"><h1>Create your account</h1></div>
		
		<div id="wrapper">
		
			<a href=".\home.php">
			
				<img src=".\arrow.png">
				
			</a>
		
			<?php
			
				if(array_key_exists('username', $_POST) OR array_key_exists('mobno', $_POST) OR array_key_exists('address', $_POST) 
					OR array_key_exists('newpssd', $_POST) OR array_key_exists('confirmpssd', $_POST) OR array_key_exists('email', $_POST)) {
			
					if($_POST['username'] == '') {
			
			?>
			
			<p id="p1" style="display:none">Username is required!</p>
				
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p1').style.display = 'block';</script>";
					
				}else if($_POST['mobno'] == '') {
			
			?>
			
			<p id="p2">Mobile Number is required!</p>
				
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p2').style.display = 'block';</script>";
						
				}else if($_POST['address'] == ''){
					
			?>
			
			<p id="p3" style="display:none">Address is required!</p>
			
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p3').style.display = 'block';</script>";
						
				}else if($_POST['newpssd'] == '') {
					
			?>
			
			<p id="p4" style="display:none">Password is required!</p>
			
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p4').style.display = 'block';</script>";
						
				}else if($_POST['confirmpssd'] == '') {
					
			?>
			
			<p id="p5" style="display:none">Confirm Password is required!</p>
			
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p5').style.display = 'block';</script>";
						
				}else if($_POST['email'] == '') {
					
			?>
			
			<p id="p6" style="display:none">Email is required!</p>
			
			<?php
			
				echo "<script type='text/javascript'>document.getElementById('p6').style.display = 'block';</script>";
						
				}else {
					
					$username = "'".$_POST['username']."'";
					$mobNo = $_POST['mobno'];
					$address = "'".$_POST['address']."'";
					$pssd = "'".$_POST['newpssd']."'";
					$email = "'".$_POST['email']."'";
					
					$query = "SELECT Mob_No from `user_info` WHERE Mob_No = ".$mobNo;
					$result = mysqli_query($link, $query);
					$row = mysqli_fetch_assoc($result);
					
					if(isset($row['Mob_No'])) {
						
			?>
			
			<p id="p7" style="display:none">Mobile Number already registered!</p>
			
			<?php
				
				echo "<script type='text/javascript'>document.getElementById('p7').style.display = 'block';</script>";
					
				}else {
					
					$query = "SELECT * FROM `user_info`";
					$result = mysqli_query($link, $query);
					$rowCount = mysqli_num_rows($result);
					$sno = $rowCount + 1;
					$query = "INSERT INTO `user_info` (Sno, Username, Mob_No, Address, Email, Password) VALUES (".$sno.", ".$username.", ".$mobNo.", ".$address.", ".$email.", "
								.$pssd.")";
					mysqli_query($link, $query);
					echo "<script type='text/javascript'>alert('Registered Successfully');</script>";
					
				}
					}
				}
					
			?>
				
				<form method="POST">
					
					<input type="text" name="username" placeholder="Username">
					<input type="number" name="mobno" placeholder="Mobile Number" id="mobNoInput">
					<input type="text" name="address" placeholder="Address">								
					<input type="password" name="newpssd" placeholder="Password" id="pssd">					
					<input type="password" name="confirmpssd" placeholder="Confirm Password" id="confirmPssd">
					<input type="text" name="email" placeholder="Email">

					<input type="submit" name="register" value="Register Now" id="registerButton" onclick="return Validate()">
					
				</form>			
		
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
			
			<script src="register.js"></script>
	
	</body>

</html>