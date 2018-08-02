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
		
		$bill = '';
		if(isset($_POST['billtype'])){
			$bill = $_POST['billtype'];
		}
 ?>
 
	 <html>
		 <head>
			<title>Graph</title>
			<link rel="stylesheet" href=".\billGraph.css">
		 </head>
		 <body>
			
			<div id="container">
			
				<header>
					<div class="container">
						<a href=".\home.php"> <div class="sub-head" id="sub-head1">HOME</div> </a>
						<a href=".\plans.php"> <div class="sub-head" id="sub-head2">PLANS</div> </a>
						<a href="#"> <div class="sub-head" id="sub-head3">FIND A STORE</div> </a>
						<a href="#"> <div class="sub-head" id="sub-head4">SUPPORT</div> </a>
						<div class="sub-head" id="sub-head5">Welcome <?php echo $loggedUser; ?> </div>
						<a href=".\myProfile.php"><div class="sub-head" id="sub-head6">My Profile</div> </a>
						<a href=".\bill.php"><div class="sub-head" id="sub-head7">My Bills</div> </a>
						<a href=".\logout.php"> <div class="sub-head" id="sub-head8">SIGN OUT</div> </a>
					</div>
				</header>
			
				<div id="heading"> <span id="first-span">Graphical Bill</span> </div>
			
				<div id="bill-choose">
					
					<form method="POST">
							
						<input type="radio" name="billtype" value="graph" checked <?php if(isset($_POST['billtype']) && $_POST['billtype'] == 'graph')?> onclick="this.form.submit()">Graph
						<input type="radio" name="billtype" value="concisebill" <?php if(isset($_POST['billtype']) && $_POST['billtype'] == 'concisebill'){
							header("Location: .\bill.php?billtype=".$_POST['billtype']);
						}?> onclick="this.form.submit()">Concise Bill 
						<input type="radio" name="billtype" value="itemizedbill" <?php if(isset($_POST['billtype']) && $_POST['billtype'] == 'itemizedbill'){
							header("Location: .\bill.php?billtype=".$_POST['billtype']);
						}?> onclick="this.form.submit()">Itemized Bill 
							
						<select name="monthselect" onchange="this.form.submit()"  id="selectmonth">
							<option value="localcalls" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='localcalls') echo "selected";?>> Local Calls </option>
							<option value="stdcalls" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='stdcalls') echo "selected";?>> STD Calls </option>
							<option value="roamingcalls" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='roamingcalls') echo "selected";?>> Roaming Calls</option>
							<option value="internetusage" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='internetusage') echo "selected";?>> Internet Usage</option>
							<option value="smsusage" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='smsusage') echo "selected";?>> SMS Usage</option>
							<option value="billhistory" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='billhistory') echo "selected";?>> Bill History</option>
						</select>
							
					</form>
						
				</div>
				
				<div id="graph-body">
				
					<div id="chart-container">
						<canvas id="mycanvas"></canvas>
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
			
			<script type="text/javascript" src="jquery.min.js"></script>
			<script type="text/javascript" src="Chart.min.js"></script>
			
			<?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='localcalls'){ ?>
				<script type="text/javascript" src="graphLocalCalls.js"></script>
			<?php } ?>
			
			<?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='stdcalls'){ ?>
				<script type="text/javascript" src="graphStdCalls.js"></script>
			<?php } ?>
			
			<?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='roamingcalls'){ ?>
				<script type="text/javascript" src="graphRoamCalls.js"></script>
			<?php } ?>
			
			<?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='internetusage'){ ?>
				<script type="text/javascript" src="graphInternetUsage.js"></script>
			<?php } ?>
			
			<?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='smsusage'){ ?>
				<script type="text/javascript" src="graphSmsUsage.js"></script>
			<?php } ?>
			
			<?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='billhistory'){ ?>
				<script type="text/javascript" src="billHistory.js"></script>
			<?php } ?>
			
		 </body>
	 </html>
	 
<?php } ?>