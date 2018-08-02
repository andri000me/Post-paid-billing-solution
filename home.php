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
	
		/* CODE TO FIND SERIAL NUMBER OF NEW ENTRY IN TABLES */
		$query = "SELECT * FROM `calls_local`";
		$result = mysqli_query($link, $query);
		$rowCount = mysqli_num_rows($result);
		$sno = $rowCount + 1;
		
		/* CODE TO FIND NEW MONTH OF SIGGNED IN USER */
		$query = "SELECT * FROM `calls_local` WHERE Mob_No = ".$loggedMobile;
		$result = mysqli_query($link, $query);
		$monthCount = mysqli_num_rows($result);
		$month = $monthCount + 1;
			
		/* ARRAY TO RANDOMLY INSERT VALUES INTO LOCAL CALLS TABLE */ $localMins = array();
		/* ARRAY TO RANDOMLY INSERT VALUES INTO STD CALLS TABLE */ $stdMins = array();
		/* ARRAY TO RANDOMLY INSERT VALUES INTO ROAMING CALLS TABLE */ $roamingMins = array();
		/* ARRAY TO RANDOMLY INSERT VALUES INTO INTERNET USAGE TABLE */ $internetUsage = array();
		/* ARRAY TO RANDOMLY INSERT VALUES INTO SMS TABLE */ $sms = array();
		$mLocal = "";
		$mStd = "";
		$mRoaming = "";
		$mInternet = "";
		$mSms = "";
		
		/* ARRAY TO RANDOMLY INSERT VALUES INTO OTHE MOBILE OF LOCAL CALLS TABLE */ $localOtherMob = array();
		/* ARRAY TO RANDOMLY INSERT VALUES INTO OTHE MOBILE OF STD CALLS TABLE */ $stdOtherMob = array();
		/* ARRAY TO RANDOMLY INSERT VALUES INTO OTHE MOBILE OF ROAMING CALLS TABLE */ $roamingOtherMob = array();
		/* ARRAY TO RANDOMLY INSERT VALUES INTO OTHE MOBILE OF SMS TABLE */ $smsOtherMob = array();
		$mLocalMob = "";
		$mStdMob = "";
		$mRoamingMob = "";
		$mSmsMob = "";
		
		if($month == '1' OR $month == '3' OR $month == '5' OR $month == '7' OR $month == '8' OR $month == '10' OR $month == '12'){
			
			/* THIS IF CONDITION WILL EXECUTE IF NEW MONTH HAS 31 DAYS */
			
			for($i = 1; $i < 32; $i++) {
				
				$minLocal = mt_rand(0, 120); 
				$minStd = mt_rand(0, 100);
				$minRoaming = mt_rand(0, 100);;
				$mbInternet = mt_rand(0, 3000); 
				$nSms = mt_rand(0, 15);
					
				/* INSERTING RANDOM VALUES IN ARRAYS */
				$localMins[$i] = $minLocal; 
				$stdMins[$i] = $minStd; 
				$roamingMins[$i] = $minRoaming; 
				$internetUsage[$i] = $mbInternet; 
				$sms[$i] = $nSms;
					
				/* GENERATING STRING FOR QUERY */
				$mLocal = $mLocal.", ".$localMins[$i]; 
				$mStd = $mStd.", ".$stdMins[$i]; 
				$mRoaming = $mRoaming.", ".$roamingMins[$i]; 
				$mInternet = $mInternet.", ".$internetUsage[$i];
				$mSms = $mSms.", ".$sms[$i];	
				
			}
			
			/* QUERY TO INSERT VALUES INTO LOCAL CALLS TABLE */
			$queryLocal = "INSERT INTO `calls_local` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Day31,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mLocal;
			/* QUERY TO INSERT VALUES INTO STD CALLS TABLE */
			$queryStd = "INSERT INTO `calls_std` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Day31,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mStd;
			/* QUERY TO INSERT VALUES INTO ROAMING CALLS TABLE */
			$queryRoaming = "INSERT INTO `calls_roaming` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Day31,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mRoaming;
			/* QUERY TO INSERT VALUES INTO INTERNET USAGE TABLE */
			$queryInternet = "INSERT INTO `internet_usage` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Day31,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mInternet;
			/* QUERY TO INSERT VALUES INTO SMS TABLE */
			$querySms = "INSERT INTO `sms` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Day31,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mSms;
			
		}else if($month == '4' OR $month == '6' OR $month == '9' OR $month == '11'){
			
			/* THIS IF CONDITION WILL BE EXECUTE IF NEW MONTH HAS 30 DAYS */
			
			for($i = 1; $i < 31; $i++) {
				
				$minLocal = mt_rand(0, 120); 
				$minStd = mt_rand(0, 100);
				$minRoaming = mt_rand(0, 100);;
				$mbInternet = mt_rand(0, 3000); 
				$nSms = mt_rand(0, 15);
					
				/* INSERTING RANDOM VALUES IN ARRAYS */
				$localMins[$i] = $minLocal; 
				$stdMins[$i] = $minStd; 
				$roamingMins[$i] = $minRoaming; 
				$internetUsage[$i] = $mbInternet; 
				$sms[$i] = $nSms;
					
				/* GENERATING STRING FOR QUERY */
				$mLocal = $mLocal.", ".$localMins[$i]; 
				$mStd = $mStd.", ".$stdMins[$i]; 
				$mRoaming = $mRoaming.", ".$roamingMins[$i]; 
				$mInternet = $mInternet.", ".$internetUsage[$i];
				$mSms = $mSms.", ".$sms[$i];
				
			}
			
			/* QUERY TO INSERT VALUES INTO LOCAL CALLS TABLE */
			$queryLocal = "INSERT INTO `calls_local` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mLocal;
			/* QUERY TO INSERT VALUES INTO STD CALLS TABLE */
			$queryStd = "INSERT INTO `calls_std` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mStd;
			/* QUERY TO INSERT VALUES INTO ROAMING CALLS TABLE */
			$queryRoaming = "INSERT INTO `calls_roaming` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mRoaming;
			/* QUERY TO INSERT VALUES INTO INTERNET USAGE TABLE */
			$queryInternet = "INSERT INTO `internet_usage` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mInternet;
			/* QUERY TO INSERT VALUES INTO SMS TABLE */
			$querySms = "INSERT INTO `sms` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Day29,Day30,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mSms;
						
						
		}else if($month == '2'){
			
			/* THIS IF CONDITION WILL BE EXECUTE IF NEW MONTH IS FEBRUARY */
			
			for($i = 1; $i < 29; $i++) {
				
				$minLocal = mt_rand(0, 120); 
				$minStd = mt_rand(0, 100);
				$minRoaming = mt_rand(0, 100);;
				$mbInternet = mt_rand(0, 3000); 
				$nSms = mt_rand(0, 15);
					
				/* INSERTING RANDOM VALUES IN ARRAYS */
				$localMins[$i] = $minLocal; 
				$stdMins[$i] = $minStd; 
				$roamingMins[$i] = $minRoaming; 
				$internetUsage[$i] = $mbInternet; 
				$sms[$i] = $nSms;
					
				/* GENERATING STRING FOR QUERY */
				$mLocal = $mLocal.", ".$localMins[$i]; 
				$mStd = $mStd.", ".$stdMins[$i]; 
				$mRoaming = $mRoaming.", ".$roamingMins[$i]; 
				$mInternet = $mInternet.", ".$internetUsage[$i];
				$mSms = $mSms.", ".$sms[$i];
				
			}
			
			/* QUERY TO INSERT VALUES INTO LOCAL CALLS TABLE */
			$queryLocal = "INSERT INTO `calls_local` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mLocal;
			/* QUERY TO INSERT VALUES INTO STD CALLS TABLE */
			$queryStd = "INSERT INTO `calls_std` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mStd;
			/* QUERY TO INSERT VALUES INTO ROAMING CALLS TABLE */
			$queryRoaming = "INSERT INTO `calls_roaming` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mRoaming;
			/* QUERY TO INSERT VALUES INTO INTERNET USAGE TABLE */
			$queryInternet = "INSERT INTO `internet_usage` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mInternet;
			/* QUERY TO INSERT VALUES INTO SMS TABLE */
			$querySms = "INSERT INTO `sms` (Sno, Mob_No, Month, Day1,Day2,Day3,Day4,Day5,Day6,Day7,Day8,Day9,Day10,Day11,Day12,Day13,Day14,Day15,
						Day16,Day17,Day18,Day19,Day20,Day21,Day22,Day23,Day24,Day25,Day26,Day27,Day28,Plan) VALUES (".$sno.", ".$loggedMobile.", "
						.$month.$mSms;
						
		}		
		
		if(isset($_POST['plan399'])){
			
			$queryLocal = $queryLocal.", 'Plan_399'".")";
			$queryStd = $queryStd.", 'Plan_399'".")";
			$queryRoaming = $queryRoaming.", 'Plan_399'".")";
			$queryInternet = $queryInternet.", 'Plan_399'".")";
			$querySms = $querySms.", 'Plan_399'".")";
			
		}else if(isset($_POST['plan499'])){
			
			$queryLocal = $queryLocal.", 'Plan_499'".")";
			$queryStd = $queryStd.", 'Plan_499'".")";
			$queryRoaming = $queryRoaming.", 'Plan_499'".")";
			$queryInternet = $queryInternet.", 'Plan_499'".")";
			$querySms = $querySms.", 'Plan_499'".")";
			
		}else if(isset($_POST['plan599'])){
			
			$queryLocal = $queryLocal.", 'Plan_599'".")";
			$queryStd = $queryStd.", 'Plan_599'".")";
			$queryRoaming = $queryRoaming.", 'Plan_599'".")";
			$queryInternet = $queryInternet.", 'Plan_599'".")";
			$querySms = $querySms.", 'Plan_599'".")";
			
		}
		
		mysqli_query($link, $queryLocal);
		mysqli_query($link, $queryStd);
		mysqli_query($link, $queryRoaming);
		mysqli_query($link, $queryInternet);
		mysqli_query($link, $querySms);
		
?>

<html>

	<head>

		<title>HOME</title>
		
		<link rel="stylesheet" href=".\loggedHome.css">
		
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
			
			<div class="heading">
		
				<span id="span-head">Most Affordable Postpaid Plans</span>
		
			</div>
		
		<div id="plans-div">
		
			<div id="image1"><img src="Airtel-my-plan.jpg" id="image"></div>
			<a href=".\bill.php"><div id="image2"><img src="image1.jpg" id="image2sub"></div></a>
			<a href=".\plans.php"><div id="image3"><img src="image2.jpg" id="image3sub"></div></a>
		
			<div id="plans-div2">
			
				<form method="POST">
					
					<div class="div-box">
								
						<ul class="ulist-class">
							<li class="list-1">Rs 399</li>
							<li class="list-2">15GB DATA</li>
							<li class="list-3">UL(Local/STD)</li>
							<!-- <li class="list-4"><input type="submit" name="plan399" id="buy-btn1" value="Buy now" onclick="return confirm('Buy this plan!!')"></li> -->
						</ul>
									
					</div>
					<div class="div-box">
								
						<ul class="ulist-class">
							<li class="list-1">Rs 499</li>
							<li class="list-2">30GB DATA</li>
							<li class="list-3">UL(Local/STD)</li>
							<!-- <li class="list-4"><input type="submit" name="plan499" id="buy-btn2" value="Buy now" onclick="return confirm('Buy this plan!!')"></li> -->
						</ul>
									
					</div>
					<div class="div-box">
								
						<ul class="ulist-class">
							<li class="list-1">Rs 599</li>
							<li class="list-2">45GB DATA</li>
							<li class="list-3">UL(Local/STD)</li>
							<!-- <li class="list-4"><input type="submit" name="plan599" id="buy-btn3" value="Buy now" onclick="return confirm('Buy this plan!!')"></li> -->
						</ul>
									
					</div>
										
				</form>
			
			</div>
		
		</div>
		
		<div id="addondiv">
			
			<div class="heading">
		
				<span id="span-head">ADD ON SERVICES</span>
		
			</div>
			
			<div>
			
				<table id="addontable">
				
					<tr>
					
						<td>Local Calls</td>
						<td>0.5/min</td>
						
					
					</tr>
					
					<tr>
					
						<td>STD Calls</td>
						<td>1/min</td>
					
					</tr>
					
					<tr>
					
						<td>Roaming Calls</td>
						<td>5/min</td>
					
					</tr>
					
					<tr>
					
						<td>SMS</td>
						<td>3/SMS</td>
					
					</tr>
					
					<tr>
					
						<td>Internet Usage</td>
						<td>10/MB</td>
					
					</tr>
				
				</table>
			
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
		
		<script src="home.js"></script>
		
	</body>

</html>

	<?php }else { ?>
	
		<html>

			<head>

				<title>HOME</title>
				
				<link rel="stylesheet" href=".\home.css">
				
			</head>

			<body>
				
				<div id="container">
					
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
					
					<div class="heading">
				
						<span id="span-head">Most Affordable Postpaid Plans</span>
				
					</div>
				
					<div id="plans-div">
					
						<div id="image1"><img src="Airtel-my-plan.jpg" id="image"></div>
						<a href=".\bill.php"><div id="image2"><img src="image1.jpg" id="image2sub"></div></a>
						<a href=".\plans.php"><div id="image3"><img src="image2.jpg" id="image3sub"></div></a>
						
		
						<div id="plans-div2">
						
							<form method="POST">
								
								<div class="div-box">
											
									<ul class="ulist-class">
										<li class="list-1">Rs 399</li>
										<li class="list-2">15GB DATA</li>
										<li class="list-3">UL(Local/STD)</li>
										<!-- <li class="list-4"><input type="submit" id="buy-btn1" value="Buy now"></li> -->
									</ul>
												
								</div>
								<div class="div-box">
											
									<ul class="ulist-class">
										<li class="list-1">Rs 499</li>
										<li class="list-2">30GB DATA</li>
										<li class="list-3">UL(Local/STD)</li>
										<!-- <li class="list-4"><input type="submit" id="buy-btn2" value="Buy now"></li> -->
									</ul>
												
								</div>
								<div class="div-box">
											
									<ul class="ulist-class">
										<li class="list-1">Rs 599</li>
										<li class="list-2">45GB DATA</li>
										<li class="list-3">UL(Local/STD)</li>
										<!-- <li class="list-4"><input type="submit" id="buy-btn3" value="Buy now"></li> -->
									</ul>
												
								</div>
													
							</form>
						
						</div>
					
					</div>
					
					<div id="addondiv">
			
			<div class="heading">
		
				<span id="span-head">ADD ON SERVICES</span>
		
			</div>
			
			<div>
			
				<table id="addontable">
				
					<tr>
					
						<td>Local Calls</td>
						<td>0.5/min</td>
						
					
					</tr>
					
					<tr>
					
						<td>STD Calls</td>
						<td>1/min</td>
					
					</tr>
					
					<tr>
					
						<td>Roaming Calls</td>
						<td>5/min</td>
					
					</tr>
					
					<tr>
					
						<td>SMS</td>
						<td>3/SMS</td>
					
					</tr>
					
					<tr>
					
						<td>Internet Usage</td>
						<td>10/MB</td>
					
					</tr>
				
				</table>
			
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
				
				
				
				
				<script src="home.js"></script>
				
			</body>

		</html>
	
	<?php } ?>