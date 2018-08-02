<?php 

	include 'dbconfig.php';
	session_start();
	
	if(isset($_SESSION['mobSession'])) {
		
		$loggedMobile = $_SESSION['mobSession'];
		$query = "SELECT Username FROM `user_info` WHERE Mob_No = ".$loggedMobile;
		$result = mysqli_query($link, $query);
		
		while($row = mysqli_fetch_array($result)){
			$loggedUser = $row['Username'];
		}
	

?>
	<html>
	
		<head>
		
			<title>Profile</title>
			
			<link rel="stylesheet" href=".\myProfile.css">
		
		</head>
		
		<body>
		
			<div id="container">
			
			<header>
		
				<div class="container">
				
					<a href=".\home.php"> <div class="sub-head" id="sub-head1">HOME</div> </a>
					<a href=".\plans.php"> <div class="sub-head" id="sub-head2">PLANS</div> </a>
					<a href="#"> <div class="sub-head" id="sub-head3">FIND A STORE</div> </a>
					<a href="#"> <div class="sub-head" id="sub-head4">SUPPORT</div> </a>
					<div class="sub-head" id="sub-head5">Welcome <?php echo $loggedUser; ?></div>
					<a href=".\myProfile.php"><div class="sub-head" id="sub-head6">My Profile</div> </a>
					<a href=".\bill.php"><div class="sub-head" id="sub-head7">My Bills</div> </a>
					<a href=".\logout.php"> <div class="sub-head" id="sub-head8">SIGN OUT</div> </a>
						
				</div>
				
			</header>
			
			<div id="profileContent">
			
				<div id="userName"><span id="userSpan"><?php echo $loggedUser; ?> Profile</span></div>
				
				<div id="profileData">
				
					<div id="pd1">Login & Contact Details</div>
					<div id="pd2"><span class="pdHeading">Mobile Number</span><br><?php echo $loggedMobile; ?></div>
					<div id="pd3"><span class="pdHeading">Password</span><br><span id="dot">.........</span></div>
					<div id="pd4"><span class="pdHeading">Email</span><br><?php 

						$query = "SELECT Email FROM `user_info` WHERE Mob_No = ".$loggedMobile;
						$result = mysqli_query($link, $query);
						
						while($row = mysqli_fetch_array($result)){
							$userEmail = $row['Email'];
						}
						
						echo $userEmail;

					?></div>
					<div id="pd5"><span class="pdHeading">Residential Address</span><br><?php 

						$query = "SELECT Address FROM `user_info` WHERE Mob_No = ".$loggedMobile;
						$result = mysqli_query($link, $query);
						
						while($row = mysqli_fetch_array($result)){
							$userAddress = $row['Address'];
						}
						
						echo $userAddress;

					?></div>
					<div id="pd6"><span class="pdHeading">Alternate Contact</span><br>-</div>
				
				</div>
			
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
			
		</div>
		
		</body>
	
	</html>
	
	<?php } ?>