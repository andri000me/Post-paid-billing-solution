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
			<title>Bill</title>
			<link rel="stylesheet" href=".\bill.css">
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
				
				<div id="heading"> <span id="first-span">Bill Details</span> </div>
				
				<div id="bill-choose">
				
					<form method="POST">
						
						<input type="radio" name="billtype" value="graph" <?php if(isset($_POST['billtype']) && $_POST['billtype'] == 'graph'){
							header("Location: .\billGraph.php");						
						}?> onclick="this.form.submit()">Graph
						
						<?php
							
						?>
						<input type="radio" name="billtype" value="concisebill"  <?php 
							if(isset($_POST['billtype']) && $_POST['billtype']=='concisebill') echo ' checked="checked"'; 
							if(isset($_GET['billtype']) && $_GET['billtype']=='concisebill') echo ' checked="checked"';
						?> onclick="this.form.submit()">Concise Bill 
						<input type="radio" name="billtype" value="itemizedbill"  <?php 
							if(isset($_POST['billtype']) && $_POST['billtype']=='itemizedbill')  echo ' checked="checked"';
							if(isset($_GET['billtype']) && $_GET['billtype']=='itemizedbill') echo ' checked="checked"';
						?> onclick="this.form.submit()">Itemized Bill 
						
						<select name="monthselect" onchange="this.form.submit()"  id="selectmonth">
							<option value="1" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='1') echo "selected";?>> Month-1 </option>
							<option value="2" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='2') echo "selected";?>> Month-2 </option>
							<option value="3" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='3') echo "selected";?>> Month-3 </option>
							<option value="4" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='4') echo "selected";?>> Month-4 </option>
							<option value="5" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='5') echo "selected";?>> Month-5 </option>
							<option value="6" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='6') echo "selected";?>> Month-6 </option>
							<option value="7" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='7') echo "selected";?>> Month-7 </option>
							<option value="8" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='8') echo "selected";?>> Month-8 </option>
							<option value="9" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='9') echo "selected";?>> Month-9 </option>
							<option value="10" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='10') echo "selected";?>> Month-10 </option>
							<option value="11" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='11') echo "selected";?>> Month-11 </option>
							<option value="12" <?php if(isset($_POST['monthselect']) && $_POST['monthselect']=='12') echo "selected";?>> Month-12 </option>
						</select>
						
					</form>
					
				</div>
				
				<?php 
					if($bill == "concisebill"){
				?>
				
				<div id="bill-owner">
					<?php echo $loggedUser; ?> Bill Details
				</div>
								
				<div id="bill-report">
					<table class="table-1">
					<!-- ROW-1 -->
						<tr style="border-top: 2px solid #6C6C6C;border-bottom: 2px solid #6C6C6C;">
							<th colspan="2" style="border-right: 1px solid black;">Bill Period<br><span class="row-1-content">Month: <?php echo $_POST['monthselect']; ?></span></th>
							<th colspan="2" style="border-right: 1px solid black;">Mobile Number<br><span class="row-1-content"><?php echo $loggedMobile; ?><span></th>
							<!-- PHP CODE TO FIND PLAN FOR THE SELECTED MONTH -->
							<?php 	
								$query = "SELECT Plan FROM `calls_local` WHERE Mob_No = ".$loggedMobile." AND Month = ".$_POST['monthselect'];
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_array($result);
								$planSelected = $row['Plan'];
							?>
							<th colspan="2">Plan<br><span class="row-1-content"><?php echo $planSelected; ?><span></th>
						</tr>
						<!-- ROW-2 -->
						<tr>
							<th align="left">Call Charges</th>
							<th></th>
							<th align="right">Usage<br><span class="sub-script">Min</span></th>
							<!-- <th align="right">Free Usage<br><span class="sub-script">Min</span></th> -->
							<th align="right">Charged Usage<br><span class="sub-script">Min</span></th>
							<th align="right">Charges<br><span class="sub-script">Rs</span></th>
						</tr>
						<!-- ROW-3 -->
						<!-- TABLE ROW FOR LOCAL CALLS -->
						<tr>
							<td>Local</td>
							<td></td>
							<!-- PHP CODE TO FIND TOTAL CALL MINUTES FOR THE SELECTED MONTH -->
							<?php 
								$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
													+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Calls FROM `calls_local`
													WHERE Month = ".$_POST['monthselect']." AND Mob_No = ".$loggedMobile;
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_assoc($result);
								$totalLocalCalls = $row['Total_Calls'];
							?>
							<td><?php echo $totalLocalCalls; ?></td>
							<!--<td></td> -->
							<!-- PHP CODE TO FIND TOTAL CHARGED USAGE FOR THE SELECTED MONTH -->
							<?php 
								$totalChargedLocalCalls = 0.0;
								$chargedLocalCalls = 0;
								if($planSelected == 'Plan_99'){
									if($totalLocalCalls > 600){
										$chargedLocalCalls = $totalLocalCalls - 600;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_149'){
									if($totalLocalCalls > 1500){
										$chargedLocalCalls = $totalLocalCalls - 1500;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_199' OR $planSelected == 'Plan_399'){
									if($totalLocalCalls > 3000){
										$chargedLocalCalls = $totalLocalCalls - 3000;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_235' OR $planSelected == 'Plan_249'){
									if($totalLocalCalls > 4500){
										$chargedLocalCalls = $totalLocalCalls - 4500;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_309'){
									if($totalLocalCalls > 6000){
										$chargedLocalCalls = $totalLocalCalls - 6000;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_355'){
									if($totalLocalCalls > 7500){
										$chargedLocalCalls = $totalLocalCalls - 7500;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								}
							?>
							<td><?php echo $chargedLocalCalls; ?></td>
							<td><?php echo $totalChargedLocalCalls; ?></td>
						</tr>
						<!-- ROW-4 -->
						<!-- TABLE ROW FOR STD CALLS -->
						<tr>
							<td>STD</td>
							<td></td>
							<!-- PHP CODE TO FIND TOTAL CALL MINUTES FOR THE SELECTED MONTH -->
							<?php 
								$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
													+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Calls FROM `calls_std`
													WHERE Month = ".$_POST['monthselect']." AND Mob_No = ".$loggedMobile;
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_assoc($result);
								$totalStdCalls = $row['Total_Calls'];
							?>
							<td><?php echo $totalStdCalls; ?></td>
							<!--<td></td> -->
							<!-- PHP CODE TO FIND TOTAL CHARGED USAGE FOR THE SELECTED MONTH -->
							<?php 
								$totalChargedStdCalls = 0.0;
								$chargedStdCalls = 0;
								if($planSelected == 'Plan_99'){
									if($totalStdCalls){
										$chargedStdCalls = $totalStdCalls;
										$totalChargedStdCalls = $chargedStdCalls * 1;
									}
								} else if($planSelected == 'Plan_149'){
									if($totalStdCalls){
										$chargedStdCalls = $totalStdCalls;
										$totalChargedStdCalls = $chargedStdCalls * 1;
									}
								} else if($planSelected == 'Plan_199'){
									if($totalStdCalls){
										$chargedStdCalls = $totalStdCalls;
										$totalChargedStdCalls = $chargedStdCalls * 1;
									}
								} else if($planSelected == 'Plan_399'){
									if($totalStdCalls > 3000){
										$chargedStdCalls = $totalStdCalls - 3000;
										$totalChargedStdCalls = $chargedStdCalls * 1;
									}
								} else if($planSelected == 'Plan_235' OR $planSelected == 'Plan_249'){
									if($totalStdCalls > 4500){
										$chargedStdCalls = $totalStdCalls - 4500;
										$totalChargedStdCalls = $chargedStdCalls * 1;
									}
								} else if($planSelected == 'Plan_309'){
									if($totalStdCalls > 6000){
										$chargedStdCalls = $totalStdCalls - 6000;
										$totalChargedStdCalls = $chargedStdCalls * 1;
									}
								} else if($planSelected == 'Plan_355'){
									if($totalStdCalls > 7500){
										$chargedStdCalls = $totalStdCalls - 7500;
										$totalChargedStdCalls = $chargedStdCalls * 1;
									}
								}
							?>
							<td><?php echo $chargedStdCalls; ?></td>
							<td><?php echo $totalChargedStdCalls; ?></td>
						</tr>
						<!-- ROW-5 -->
						<tr>
							<td>Total</td>
							<td></td>
							<td><?php echo $totalLocalCalls+$totalStdCalls; ?></td>
							<!--<td></td> -->
							<td><?php echo ($chargedLocalCalls+$chargedStdCalls); ?></td>
							<td><?php echo ($totalChargedLocalCalls+$totalChargedStdCalls); ?></td>
						</tr>
						<!-- ROW-6 -->
						<tr>
							<th align="left">Mobile Internet Charges</th>
							<th align="right">Usage<br><span class="sub-script">KB</span></th>
							<th align="right">Usage<br><span class="sub-script">MB</span></th>
							<!--<th align="right">Free Usage<br><span class="sub-script">MB</span></th>-->
							<th align="right">Charged Usage<br><span class="sub-script">MB</span></th>
							<th align="right">Charges<br><span class="sub-script">Rs</span></th>
						</tr>
						<!-- ROW-7 -->
						<tr>
							<td>Internet Usage<br><span class="sub-script">Data Conversion: 1 MB = 1,024 KB | 1 GB = 1,024 MB</span></td>
							<?php 
								$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
													+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Internet_Usage FROM `internet_usage` WHERE Month = "
													.$_POST['monthselect']." AND Mob_No = ".$loggedMobile;
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_assoc($result);
								$internetUsage = $row['Total_Internet_Usage'];
							?>
							<td><?php echo ($internetUsage*1024); ?></td>
							<td><?php echo ($internetUsage*1); ?></td>
							<!--<td></td> -->
							<?php 
								$totalChargedInternetUsage = 0.0;
								$chargedInternetUsage = 0;
								if($planSelected == 'Plan_399'){
									if($internetUsage > 15360){
										$chargedInternetUsage = $internetUsage - 15360;
										$totalChargedInternetUsage = $chargedInternetUsage * 10;
									}
								} else if($planSelected == 'Plan_499'){
									if($internetUsage > 30720){
										$chargedInternetUsage = $internetUsage - 30720;
										$totalChargedInternetUsage = $chargedInternetUsage * 10;
									}
								} else if($planSelected == 'Plan_599'){
									if($internetUsage > 46080){
										$chargedInternetUsage = $internetUsage - 46080;
										$totalChargedInternetUsage = $chargedInternetUsage * 10;
									}
								} else if($planSelected == 'Plan_999'){
									if($internetUsage > 92160){
										$chargedInternetUsage = $internetUsage - 92160;
										$totalChargedInternetUsage = $chargedInternetUsage * 10;
									}
								} else if($planSelected == 'Plan_1199'){
									if($internetUsage > 122880){
										$chargedInternetUsage = $internetUsage - 122880;
										$totalChargedInternetUsage = $chargedInternetUsage * 10;
									}
								} else if($planSelected == 'Plan_1599'){
									if($internetUsage > 153600){
										$chargedInternetUsage = $internetUsage - 153600;
										$totalChargedInternetUsage = $chargedInternetUsage * 10;
									}
								} else if($planSelected == 'Plan_1999'){
									if($internetUsage > 245760){
										$chargedInternetUsage = $internetUsage - 245760;
										$totalChargedInternetUsage = $chargedInternetUsage * 10;
									}
								} else if($planSelected == 'Plan_2599'){
									if($internetUsage > 307200){
										$chargedInternetUsage = $internetUsage - 307200;
										$totalChargedInternetUsage = $chargedInternetUsage * 10;
									}
								}
							?>
							<td>0.0</td>
							<td>0.0</td>
						</tr>
						<!-- ROW-7 -->
						<tr>
							<td>Total</td>
							<td><?php echo ($internetUsage*1024); ?></td>
							<td><?php echo ($internetUsage*1); ?></td>
							<!--<td></td> -->
							<td>0.0</td>
							<td>0.0</td>
						</tr>
						<!-- ROW-8 -->
						<tr>
							<th align="left">National Roaming Charges</th>
							<th></th>
							<th align="right">Usage<br><span class="sub-script">Min</span></th>
							<!--<th align="right">Free Usage<br><span class="sub-script">Min</span></th>-->
							<th align="right">Charged Usage<br><span class="sub-script">Min</span></th>
							<th align="right">Charges<br><span class="sub-script">Rs</span></th>
						</tr>
						
						<!-- ROW-9 -->
						<tr>
							<td>Roaming Calls</td>
							<td></td>
							<?php 
								$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
													+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Roaming_Usage FROM `calls_roaming`
													WHERE Month = ".$_POST['monthselect']." AND Mob_No = ".$loggedMobile;
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_assoc($result);
								$totalRoamingCalls = $row['Roaming_Usage'];
							?>
							<td><?php echo $totalRoamingCalls*1; ?></td>
							<!--<td></td> -->
							<?php 
								$totalChargedRoamingCalls = 0.0;
								$chargedRoamingCalls = 0;
								if($planSelected == 'Plan_99'){
									if($totalRoamingCalls){
										$chargedRoamingCalls = $totalRoamingCalls;
										$totalChargedRoamingCalls = $chargedRoamingCalls * 5;
									}
								} else if($planSelected == 'Plan_149'){
									if($totalRoamingCalls){
										$chargedRoamingCalls = $totalRoamingCalls;
										$totalChargedRoamingCalls = $chargedRoamingCalls * 5;
									}
								} else if($planSelected == 'Plan_199'){
									if($totalRoamingCalls){
										$chargedRoamingCalls = $totalRoamingCalls;
										$totalChargedRoamingCalls = $chargedRoamingCalls * 5;
									}
								} else if($planSelected == 'Plan_235'){
									if($totalRoamingCalls){
										$chargedRoamingCalls = $totalRoamingCalls;
										$totalChargedRoamingCalls = $chargedRoamingCalls * 5;
									}
								} else if($planSelected == 'Plan_249'){
									if($totalRoamingCalls){
										$chargedRoamingCalls = $totalRoamingCalls;
										$totalChargedRoamingCalls = $chargedRoamingCalls * 5;
									}
								} else if($planSelected == 'Plan_399'){
									if($totalRoamingCalls > 3000){
										$chargedRoamingCalls = $totalRoamingCalls - 3000;
										$totalChargedRoamingCalls = $chargedRoamingCalls * 5;
									}
								} else if($planSelected == 'Plan_309'){
									if($totalRoamingCalls > 6000){
										$chargedRoamingCalls = $totalRoamingCalls - 6000;
										$totalChargedRoamingCalls = $chargedRoamingCalls * 5;
									}
								} else if($planSelected == 'Plan_355'){
									if($totalRoamingCalls > 7500){
										$chargedRoamingCalls = $totalRoamingCalls - 7500;
										$totalChargedRoamingCalls = $chargedRoamingCalls * 5;
									}
								}
							?>
							<td><?php echo $chargedRoamingCalls; ?></td>
							<td><?php echo $totalChargedRoamingCalls; ?></td>
						</tr>
						<!-- ROW-10 -->
						<tr>
							<td>Total</td>
							<td></td>
							<td><?php echo $totalRoamingCalls*1; ?></td>
							<!--<td></td> -->
							<td><?php echo $chargedRoamingCalls*1; ?></td>
							<td><?php echo $totalChargedRoamingCalls; ?></td>
						</tr>
						
						<!-- ROW-11 -->
						<tr>
							<th align="left">SMS Charges</th>
							<th></th>
							<th align="right">Usage</th>
							<!--<th align="right">Free Usage<br><span class="sub-script">Min</span></th>-->
							<th align="right">Charged Usage</th>
							<th align="right">Charges</th>
						</tr>
						
						<!-- ROW-12 -->
						<tr>
							<td>SMS</td>
							<td></td>
							<?php 
								$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
													+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Sms_Usage FROM `sms`
													WHERE Month = ".$_POST['monthselect']." AND Mob_No = ".$loggedMobile;
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_assoc($result);
								$totalSms = $row['Sms_Usage'];
							?>
							<td><?php echo $totalSms*1; ?></td>
							<!--<td></td> -->
							<?php 
								$totalChargedSms = 0.0;
								$chargedSms = 0;
								if($planSelected == 'Plan_99'){
									if($totalSms > 20){
										$chargedSms = $totalSms - 20;
										$totalChargedSms = $chargedSms * 3;
									}
								} else if($planSelected == 'Plan_149'){
									if($totalSms > 35){
										$chargedSms = $totalSms - 35;
										$totalChargedSms = $chargedSms * 3;
									}
								} else if($planSelected == 'Plan_199'){
									if($totalSms > 50){
										$chargedSms = $totalSms - 50;
										$totalChargedSms = $chargedSms * 3;
									}
								} else if($planSelected == 'Plan_235'){
									if($totalSms > 70){
										$chargedSms = $totalSms - 70;
										$totalChargedSms = $chargedSms * 3;
									}
								} else if($planSelected == 'Plan_249' OR $planSelected == 'Plan_309' OR $planSelected == 'Plan_355'){
									if($totalSms > 90){
										$chargedSms = $totalSms - 90;
										$totalChargedSms = $chargedSms * 3;
									}
								} else if($planSelected == 'Plan_399'){
									if($totalSms > 150){
										$chargedSms = $totalSms - 150;
										$totalChargedSms = $chargedSms * 3;
									}
								} else if($planSelected == 'Plan_499' OR $planSelected == 'Plan_599'){
									if($totalSms > 200){
										$chargedSms = $totalSms - 200;
										$totalChargedSms = $chargedSms * 3;
									}
								} 
							?>
							<td><?php echo $chargedSms; ?></td>
							<td><?php echo $totalChargedSms; ?></td>
						</tr>
						
						<!-- ROW-13 -->
						<tr>
							<td>Total</td>
							<td></td>
							<td><?php echo $totalSms*1; ?></td>
							<!--<td></td> -->
							<td><?php echo $chargedSms*1; ?></td>
							<td><?php echo $totalChargedSms; ?></td>
						</tr>
						
						<!-- OVERALL TOTAL -->
						
						<tr>
							<td>Overall Total</td>
							<td></td>
							<td></td>
							<td></td>
							
							<?php 
							
								$overallTotal = $totalChargedRoamingCalls + $totalChargedLocalCalls + $totalChargedStdCalls + $totalChargedSms;
								if($planSelected == 'Plan_99'){
									$overallTotal = $overallTotal + 99;
								} else if($planSelected == 'Plan_149'){
									$overallTotal = $overallTotal + 149;
								} else if($planSelected == 'Plan_199'){
									$overallTotal = $overallTotal + 199;
								} else if($planSelected == 'Plan_235'){
									$overallTotal = $overallTotal + 235;
								} else if($planSelected == 'Plan_249'){
									$overallTotal = $overallTotal + 249;
								} else if($planSelected == 'Plan_309'){
									$overallTotal = $overallTotal + 309;
								} else if($planSelected == 'Plan_355'){
									$overallTotal = $overallTotal + 355;
								} else if($planSelected == 'Plan_399'){
									$overallTotal = $overallTotal + 399;
								} else if($planSelected == 'Plan_499'){
									$overallTotal = $overallTotal + 499;
								} else if($planSelected == 'Plan_599'){
									$overallTotal = $overallTotal + 599;
								} else if($planSelected == 'Plan_999'){
									$overallTotal = $overallTotal + 999;
								} else if($planSelected == 'Plan_1199'){
									$overallTotal = $overallTotal + 1199;
								} else if($planSelected == 'Plan_1599'){
									$overallTotal = $overallTotal + 1599;
								} else if($planSelected == 'Plan_1999'){
									$overallTotal = $overallTotal + 1999;
								} else if($planSelected == 'Plan_2599'){
									$overallTotal = $overallTotal + 2599;
								}

								

							?>
							<td><?php echo $overallTotal; ?></td>
							
						</tr>
						
					</table>
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
				
				<?php 
					}else if($bill == "itemizedbill"){
				?>
				
				<!-- ITEMIZED BILL CODE -->
				
					<div id="bill-owner">
						<?php echo $loggedUser; ?> Bill Details
					</div>
					
				<div id="bill-report">
				
					<!-- TABLE-2 -->
					<table class="table-2">
					<!-- ROW-1 -->
						<tr style="border-top: 2px solid #6C6C6C;border-bottom: 2px solid #6C6C6C;">
							<th colspan="2" style="border-right: 1px solid black;">Bill Period<br><span class="row-1-content">Month: <?php echo $_POST['monthselect']; ?></span></th>
							<th colspan="2" style="border-right: 1px solid black;">Mobile Number<br><span class="row-1-content"><?php echo $loggedMobile; ?><span></th>
							<!-- PHP CODE TO FIND PLAN FOR THE SELECTED MONTH -->
							<?php 	
								$query = "SELECT Plan FROM `calls_local` WHERE Mob_No = ".$loggedMobile." AND Month = ".$_POST['monthselect'];
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_array($result);
								$planSelected = $row['Plan'];
							?>
							<th colspan="2">Plan<br><span class="row-1-content"><?php echo $planSelected; ?><span></th>
						</tr>
					</table>
					
					<!-- TABLE-3 -->
					<table class="table-3" >
						
						<tr>
							<th colspan="3">LOCAL CALLS</th>
						</tr>
						<tr>
							<th align="left">Day</th>
							<th align="center">Duration<br><span class="sub-script">Min</span></th>
							<th align="center">Charges<br><span class="sub-script">Rs</span></th>
						</tr>
						
						<?php 
							$query = "SELECT * FROM `calls_local` WHERE Mob_No = ".$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_row($result);
							
							$ab = 0.00;
							
							for($i=1; $i<=31; $i++){
								
								$totalChargedLocalCalls = 0.00;
								$chargedLocalCalls = 0;
								if($planSelected == 'Plan_99'){
									if($row[$i+3] > 20){
										$chargedLocalCalls = $row[$i+3] - 20;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_149'){
									if($row[$i+3] > 50){
										$chargedLocalCalls = $row[$i+3] - 50;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_199' OR $planSelected == 'Plan_399'){
									if($row[$i+3] > 100){
										$chargedLocalCalls = $row[$i+3] - 100;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_235' OR $planSelected == 'Plan_249'){
									if($row[$i+3] > 150){
										$chargedLocalCalls = $row[$i+3] - 150;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_309'){
									if($row[$i+3] > 200){
										$chargedLocalCalls = $row[$i+3] - 200;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								} else if($planSelected == 'Plan_355'){
									if($row[$i+3] > 250){
										$chargedLocalCalls = $row[$i+3] - 250;
										$totalChargedLocalCalls = $chargedLocalCalls * 0.50;
									}
								}
						?>
						
						<tr>
							<td align="left">Day-<?php echo $i; ?></td>
							<td align="center"><?php echo $row[$i+3]; ?></td>
							<td style="text-align: center !important;"><?php echo $totalChargedLocalCalls; ?></td>
						</tr>
						
						<?php $ab = $ab + $totalChargedLocalCalls; } ?>
						
						<tr>
							<td>Total</td>
							<?php 
							$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
											+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Duration FROM `calls_local` WHERE Mob_No = "
											.$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_assoc($result);
							
						?>
							<td><?php echo $row['Total_Duration']; ?></td>
							<td><?php echo $ab; ?></td>
						</tr>
					</table>
					
					<!-- TABLE-4 -->
					<table class="table-4">
					
						<tr>
							<th colspan="3">STD CALLS</th>
						</tr>
						<tr>
							<th align="left">Day</th>
							<th align="center">Duration<br><span class="sub-script">Min</span></th>
							<th align="center">Charges<br><span class="sub-script">Rs</span></th>
						</tr>
						
						<?php 
							$query = "SELECT * FROM `calls_std` WHERE Mob_No = ".$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_row($result);
							
							for($i=1; $i<=31; $i++){

						?>
						
						<tr>
							<td align="left">Day-<?php echo $i; ?></td>
							<td align="center"><?php echo $row[$i+3]; ?></td>
							<td style="text-align: center !important;">0</td>
						</tr>
						
						<?php } ?>
						
						<tr>
							<td>Total</td>
							<?php 
							$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
											+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Duration FROM `calls_std` WHERE Mob_No = "
											.$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_assoc($result);
							
						?>
							<td><?php echo $row['Total_Duration']; ?></td>
							<td>0</td>
						</tr>
					
					</table>
					
					<!-- TABLE-5 -->
					<table class="table-5">
					
						<tr>
							<th colspan="3">ROAMING CALLS</th>
						</tr>
						<tr>
							<th align="left">Day</th>
							<th align="center">Duration<br><span class="sub-script">Min</span></th>
							<th align="center">Charges<br><span class="sub-script">Rs</span></th>
						</tr>
						
						<?php 
							$query = "SELECT * FROM `calls_roaming` WHERE Mob_No = ".$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_row($result);
							
							for($i=1; $i<=31; $i++){
						?>
						
						<tr>
							<td align="left">Day-<?php echo $i; ?></td>
							<td align="center"><?php echo $row[$i+3]; ?></td>
							<td style="text-align: center !important;">0</td>
						</tr>
						
						<?php } ?>
						
						<tr>
							<td>Total</td>
							<?php 
							$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
											+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Duration FROM `calls_roaming` WHERE Mob_No = "
											.$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_assoc($result);
							
						?>
							<td><?php echo $row['Total_Duration']; ?></td>
							<td>0</td>
						</tr>
					
					</table>
					
					<!-- TABLE-6 -->
					<table class="table-6">
					
						<tr>
							<th colspan="3">SMS</th>
						</tr>
						<tr>
							<th align="left">Day</th>
							<th align="center">Number of sms</th>
							<th align="center">Charges<br><span class="sub-script">Rs</span></th>
						</tr>
						
						<?php 
							$query = "SELECT * FROM `sms` WHERE Mob_No = ".$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_row($result);
							
							for($i=1; $i<=31; $i++){
						?>
						
						<tr>
							<td align="left">Day-<?php echo $i; ?></td>
							<td align="center"><?php echo $row[$i+3]; ?></td>
							<td style="text-align: center !important;">0</td>
						</tr>
						
						<?php } ?>
						
						<tr>
							<td>Total</td>
							<?php 
							$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
											+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Sms FROM `sms` WHERE Mob_No = "
											.$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_assoc($result);
							
						?>
							<td><?php echo $row['Total_Sms']; ?></td>
							<td>0</td>
						</tr>
					
					</table>
					
					<!-- TABLE-7 -->
					<table class="table-7">
					
						<tr>
							<th colspan="3">INTERNET USAGE</th>
						</tr>
						<tr>
							<th align="left">Day</th>
							<th align="center">Data used<br><span class="sub-script">MB</span></th>
							<th align="center">Charges<br><span class="sub-script">Rs</span></th>
						</tr>
						
						<?php 
							$query = "SELECT * FROM `internet_usage` WHERE Mob_No = ".$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_row($result);
							
							for($i=1; $i<=31; $i++){
						?>
						
						<tr>
							<td align="left">Day-<?php echo $i; ?></td>
							<td align="center"><?php echo $row[$i+3]; ?></td>
							<td style="text-align: center !important;">0</td>
						</tr>
						
						<?php } ?>
						
						<tr>
							<td>Total</td>
							<?php 
							$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
											+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Data FROM `internet_usage` WHERE Mob_No = "
											.$loggedMobile." AND Month = ".$_POST['monthselect'];
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_assoc($result);
							
						?>
							<td><?php echo $row['Total_Data']; ?></td>
							<td>0</td>
						</tr>
					
					</table>
					
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
				
				<?php 
					} 
				?>
				
			</div>
			
			<script src="bill.js"></script>
		
		</body>
	</html>
	
	<?php }else {
		header("Location: .\login.php");
	} ?>