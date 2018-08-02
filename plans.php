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
				
				if(isset($_POST['plan99'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 20);
					$minRoaming = mt_rand(0, 20);
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else if(isset($_POST['plan149'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 20);
					$minRoaming = mt_rand(0, 20);
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else if(isset($_POST['plan199'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 20);
					$minRoaming = mt_rand(0, 20);
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else if(isset($_POST['plan235']) OR isset($_POST['plan249'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 100);
					$minRoaming = mt_rand(0, 20);
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else{
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 100);
					$minRoaming = mt_rand(0, 100);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
				
				if(isset($_POST['plan99'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 20);;
					$minRoaming = mt_rand(0, 20);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else if(isset($_POST['plan149'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 20);;
					$minRoaming = mt_rand(0, 20);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else if(isset($_POST['plan199'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 20);;
					$minRoaming = mt_rand(0, 20);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else if(isset($_POST['plan235']) OR isset($_POST['plan249'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 100);
					$minRoaming = mt_rand(0, 20);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else{
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 100);
					$minRoaming = mt_rand(0, 100);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
				
				if(isset($_POST['plan99'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 20);;
					$minRoaming = mt_rand(0, 20);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else if(isset($_POST['plan149'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 20);;
					$minRoaming = mt_rand(0, 20);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else if(isset($_POST['plan199'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 20);;
					$minRoaming = mt_rand(0, 20);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else if(isset($_POST['plan235']) OR isset($_POST['plan249'])){
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 100);
					$minRoaming = mt_rand(0, 20);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
					
				} else{
					
					$minLocal = mt_rand(0, 100); 
					$minStd = mt_rand(0, 100);
					$minRoaming = mt_rand(0, 100);;
					$mbInternet = mt_rand(0, 2000); 
					$nSms = mt_rand(0, 20);
					
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
		
		if(isset($_POST['plan99'])){
			
			$queryLocal = $queryLocal.", 'Plan_99'".")";
			$queryStd = $queryStd.", 'Plan_99'".")";
			$queryRoaming = $queryRoaming.", 'Plan_99'".")";
			$queryInternet = $queryInternet.", 'Plan_99'".")";
			$querySms = $querySms.", 'Plan_99'".")";
				
		}else if(isset($_POST['plan149'])){
			
			$queryLocal = $queryLocal.", 'Plan_149'".")";
			$queryStd = $queryStd.", 'Plan_149'".")";
			$queryRoaming = $queryRoaming.", 'Plan_149'".")";
			$queryInternet = $queryInternet.", 'Plan_149'".")";
			$querySms = $querySms.", 'Plan_149'".")";
			
		}else if(isset($_POST['plan199'])){
			
			$queryLocal = $queryLocal.", 'Plan_199'".")";
			$queryStd = $queryStd.", 'Plan_199'".")";
			$queryRoaming = $queryRoaming.", 'Plan_199'".")";
			$queryInternet = $queryInternet.", 'Plan_199'".")";
			$querySms = $querySms.", 'Plan_199'".")";
			
		}else if(isset($_POST['plan235'])){
			
			$queryLocal = $queryLocal.", 'Plan_235'".")";
			$queryStd = $queryStd.", 'Plan_235'".")";
			$queryRoaming = $queryRoaming.", 'Plan_235'".")";
			$queryInternet = $queryInternet.", 'Plan_235'".")";
			$querySms = $querySms.", 'Plan_235'".")";
			
		}else if(isset($_POST['plan249'])){
			
			$queryLocal = $queryLocal.", 'Plan_249'".")";
			$queryStd = $queryStd.", 'Plan_249'".")";
			$queryRoaming = $queryRoaming.", 'Plan_249'".")";
			$queryInternet = $queryInternet.", 'Plan_249'".")";
			$querySms = $querySms.", 'Plan_249'".")";
			
		}else if(isset($_POST['plan309'])){
			
			$queryLocal = $queryLocal.", 'Plan_309'".")";
			$queryStd = $queryStd.", 'Plan_309'".")";
			$queryRoaming = $queryRoaming.", 'Plan_309'".")";
			$queryInternet = $queryInternet.", 'Plan_309'".")";
			$querySms = $querySms.", 'Plan_309'".")";
			
		}else if(isset($_POST['plan355'])){
			
			$queryLocal = $queryLocal.", 'Plan_355'".")";
			$queryStd = $queryStd.", 'Plan355'".")";
			$queryRoaming = $queryRoaming.", 'Plan_355'".")";
			$queryInternet = $queryInternet.", 'Plan_355'".")";
			$querySms = $querySms.", 'Plan_355'".")";
			
		}else if(isset($_POST['plan399'])){
			
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
			
		}else if(isset($_POST['plan999'])){
			
			$queryLocal = $queryLocal.", 'Plan_999'".")";
			$queryStd = $queryStd.", 'Plan_999'".")";
			$queryRoaming = $queryRoaming.", 'Plan_999'".")";
			$queryInternet = $queryInternet.", 'Plan_999'".")";
			$querySms = $querySms.", 'Plan_999'".")";
			
		}else if(isset($_POST['plan1199'])){
			
			$queryLocal = $queryLocal.", 'Plan_1199'".")";
			$queryStd = $queryStd.", 'Plan_1199'".")";
			$queryRoaming = $queryRoaming.", 'Plan_1199'".")";
			$queryInternet = $queryInternet.", 'Plan_1199'".")";
			$querySms = $querySms.", 'Plan_1199'".")";
			
		}else if(isset($_POST['plan1599'])){
			
			$queryLocal = $queryLocal.", 'Plan_1599'".")";
			$queryStd = $queryStd.", 'Plan_1599'".")";
			$queryRoaming = $queryRoaming.", 'Plan_1599'".")";
			$queryInternet = $queryInternet.", 'Plan_1599'".")";
			$querySms = $querySms.", 'Plan_1599'".")";
			
		}else if(isset($_POST['plan1999'])){
			
			$queryLocal = $queryLocal.", 'Plan_1999'".")";
			$queryStd = $queryStd.", 'Plan_1999'".")";
			$queryRoaming = $queryRoaming.", 'Plan_1999'".")";
			$queryInternet = $queryInternet.", 'Plan_1999'".")";
			$querySms = $querySms.", 'Plan_1999'".")";
			
		}else if(isset($_POST['plan2599'])){
			
			$queryLocal = $queryLocal.", 'Plan_2599'".")";
			$queryStd = $queryStd.", 'Plan_2599'".")";
			$queryRoaming = $queryRoaming.", 'Plan_2599'".")";
			$queryInternet = $queryInternet.", 'Plan_2599'".")";
			$querySms = $querySms.", 'Plan_2599'".")";
			
		}
		
		mysqli_query($link, $queryLocal);
		mysqli_query($link, $queryStd);
		mysqli_query($link, $queryRoaming);
		mysqli_query($link, $queryInternet);
		mysqli_query($link, $querySms);
	

?>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------      -->

		<?php	

	$planSelected = '';
	if(isset($_POST['plan99'])){
			
		$planSelected = 'Plan_99';
				
	}else if(isset($_POST['plan149'])){
			
		$planSelected = 'Plan_149';
			
	}else if(isset($_POST['plan199'])){
			
		$planSelected = 'Plan_199';
			
	}else if(isset($_POST['plan235'])){
			
		$planSelected = 'Plan_235';
			
	}else if(isset($_POST['plan249'])){
			
		$planSelected = 'Plan_249';
			
	}else if(isset($_POST['plan309'])){
			
		$planSelected = 'Plan_309';
			
	}else if(isset($_POST['plan355'])){
			
		$planSelected = 'Plan_355';
			
	}else if(isset($_POST['plan399'])){
			
		$planSelected = 'Plan_399';
			
	}else if(isset($_POST['plan499'])){
			
		$planSelected = 'Plan_499';
			
	}else if(isset($_POST['plan599'])){
			
		$planSelected = 'Plan_599';
			
	}else if(isset($_POST['plan999'])){
			
		$planSelected = 'Plan_999';
			
	}else if(isset($_POST['plan1199'])){
			
		$planSelected = 'Plan_1199';
			
	}else if(isset($_POST['plan1599'])){
			
		$planSelected = 'Plan_1599';
			
	}else if(isset($_POST['plan1999'])){
			
		$planSelected = 'Plan_1999';
			
	}else if(isset($_POST['plan2599'])){
			
		$planSelected = 'Plan_2599';
			
	}
?>
							
<?php 
	$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
						+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Calls FROM `calls_local`
						WHERE Month = ".$month." AND Mob_No = ".$loggedMobile;
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$totalLocalCalls = $row['Total_Calls'];
?>
							
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
							
							<?php 
								$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
													+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Calls FROM `calls_std`
													WHERE Month = ".$month." AND Mob_No = ".$loggedMobile;
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_assoc($result);
								$totalStdCalls = $row['Total_Calls'];
							?>
							
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
							
							<?php 
								$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
													+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Internet_Usage FROM `internet_usage` WHERE Month = "
													.$month." AND Mob_No = ".$loggedMobile;
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_assoc($result);
								$internetUsage = $row['Total_Internet_Usage'];
							?>
							
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
							
						
							<?php 
								$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
													+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Roaming_Usage FROM `calls_roaming`
													WHERE Month = ".$month." AND Mob_No = ".$loggedMobile;
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_assoc($result);
								$totalRoamingCalls = $row['Roaming_Usage'];
							?>
							
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
							
							<?php 
								$query = "SELECT (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
													+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Sms_Usage FROM `sms`
													WHERE Month = ".$month." AND Mob_No = ".$loggedMobile;
								$result = mysqli_query($link, $query);
								$row = mysqli_fetch_assoc($result);
								$totalSms = $row['Sms_Usage'];
							?>
							
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
							<?php
							
								$query1 = "SELECT * FROM `bill_history`";
								$result = mysqli_query($link, $query1);
								$rowCount = mysqli_num_rows($result);
								$sno = $rowCount + 1;
							
								$query2 = "INSERT INTO `bill_history` (Sno, Mob_No, Month, Amount) VALUES (".$sno.", ".$loggedMobile.", ".$month.", ".$overallTotal.")";
								mysqli_query($link, $query2);
								
							?>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------      -->

<html>

	<head>

		<title>PLANS</title>
		
		<link rel="stylesheet" href=".\loggedPlans.css">
		
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
			
			<div id="plans-head">
				PLANS
			</div>
			
			<form method="POST">
			
				<div id="image1" class="imageall">
				
					<img src=".\Plans1.jpg">
				
				</div>
				
				<div class="buybtn-div">
					<?php  ?>
					<input type="submit" name="plan99" value="Buy now" id="buybtn1" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan149" value="Buy now" id="buybtn2" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan199" value="Buy now" id="buybtn3" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan235" value="Buy now" id="buybtn4" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan249" value="Buy now" id="buybtn5" class="buybtn" onclick="return confirm('Buy this plan!!')">
				</div>
												
				<div id="image2" class="imageall">
				
					<img src=".\Plans2.jpg">
				
				</div>
				<div class="buybtn-div">
					<input type="submit" name="plan309" value="Buy now" id="buybtn1" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan355" value="Buy now" id="buybtn2" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan399" value="Buy now" id="buybtn3" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan499" value="Buy now" id="buybtn4" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan599" value="Buy now" id="buybtn5" class="buybtn" onclick="return confirm('Buy this plan!!')">
				</div>
				<div id="image3" class="imageall">
				
					<img src=".\Plans3.jpg">
				
				</div>
				<div class="buybtn-div">
					<input type="submit" name="plan999" value="Buy now" id="buybtn1" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan1199" value="Buy now" id="buybtn2" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan1599" value="Buy now" id="buybtn3" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan1999" value="Buy now" id="buybtn4" class="buybtn" onclick="return confirm('Buy this plan!!')">
					<input type="submit" name="plan2599" value="Buy now" id="buybtn5" class="buybtn" onclick="return confirm('Buy this plan!!')">
				</div>
			
			</form>
			
		
		
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
				
				<!--div id="copyright-div">Copyright © 2018 MyTele Ltd. All rights reserved</div> -->
				
			</div>
				
		</div>
							
	</body>

</html>

	<?php }else { ?>
	
		<html>

	<head>

		<title>PLANS</title>
		
		<link rel="stylesheet" href=".\plans.css">
		
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
			
			<div id="plans-head">
				PLANS
			</div>
			
			<form method="POST">
			
				<div id="image1" class="imageall">
				
					<img src=".\Plans1.jpg">
				
				</div>
				
				<div class="buybtn-div">
					<input type="submit" value="Buy now" id="buybtn1" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn2" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn3" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn4" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn5" class="buybtn">
				</div>
								
				<div id="image2" class="imageall">
				
					<img src=".\Plans2.jpg">
				
				</div>
				<div class="buybtn-div">
					<input type="submit" value="Buy now" id="buybtn1" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn2" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn3" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn4" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn5" class="buybtn">
				</div>
				<div id="image3" class="imageall">
				
					<img src=".\Plans3.jpg">
				
				</div>
				<div class="buybtn-div">
					<input type="submit" value="Buy now" id="buybtn1" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn2" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn3" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn4" class="buybtn">
					<input type="submit" value="Buy now" id="buybtn5" class="buybtn">
				</div>
			
			</form>
			
		
		
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
			
			<!--div id="copyright-div">Copyright © 2018 MyTele Ltd. All rights reserved</div> -->
				
		</div>
							
	</body>

</html>
	
	<?php } ?>