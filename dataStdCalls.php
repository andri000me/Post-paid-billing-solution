<?php

	//setting header to json
	header('Content-Type: application/json');

	//database
	define('DB_HOST', 'Localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'capstone');

	//get connection
	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if(!$mysqli){
		die("Connection failed: " . $mysqli->error);
	}

	session_start();
	
	if(isset($_SESSION['mobSession'])) {
		
		$loggedMobile = $_SESSION['mobSession'];
		
				//query to get data from the table
				$query = sprintf("SELECT Month, (Day1+Day2+Day3+Day4+Day5+Day6+Day7+Day8+Day9+Day10+Day11+Day12+Day13+Day14+Day15+Day16+Day17+Day18+Day19+Day20
												+Day21+Day22+Day23+Day24+Day25+Day26+Day27+Day28+Day29+Day30+Day31) as Total_Calls FROM `calls_std` WHERE Mob_No = ".$loggedMobile);

				//execute query
				$result = $mysqli->query($query);

				//loop through the returned data
				$data = array();
				foreach ($result as $row) {
					$data[] = $row;
				}

				//free memory associated with result
				$result->close();

				//close connection
				$mysqli->close();

				//now print the data
				print json_encode($data);

	}

?>