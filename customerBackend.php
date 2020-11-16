<?php
	libxml_use_internal_errors(true);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$urusNum = filter_input(INPUT_POST, 'urusTotal', FILTER_VALIDATE_INT);
	$avaNum = filter_input(INPUT_POST, 'avantadorTotal', FILTER_VALIDATE_INT);
	$amgNum = filter_input(INPUT_POST, 'amgTotal', FILTER_VALIDATE_INT);
	$genNum = filter_input(INPUT_POST, 'genesisTotal', FILTER_VALIDATE_INT);
	$jeskoNum = filter_input(INPUT_POST, 'jeskoTotal', FILTER_VALIDATE_INT);
	$yukonNum = filter_input(INPUT_POST, 'yukonTotal', FILTER_VALIDATE_INT);
	$shipping = $_POST['shipOptions'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$delivery = 0;
	$delLabel = "";
	$totalPrice = 0;

	

	if($shipping == "free"){
		$delivery = 0;
		$delLabel = "Free shipping";
	}else if($shipping == "threeDay"){
		$delivery = 5;
		$delLabel = "Three Days";
	}else if ($shipping == "overNight"){
		$delivery = 50;
		$delLabel = "Over night";
	}
	
	$urusPrice = 222004;
	$avantadorPrice = 421321;
	$amgPrice = 100945;
	$genesisPrice = 49925;
	$jeskoPrice = 3000000;
	$yukonPrice = 51995;

	$totalPrice = ($urusPrice * $urusNum) + ($amgPrice * $amgNum) + ($avantadorPrice * $avaNum);
	$totalPrice+= ($genesisPrice * $genNum) + ($jeskoPrice * $jeskoNum) + ($yukonPrice * $yukonNum); 

	$tax = $totalPrice * 0.7;
	$totalPrice += $tax + $delivery;



	echo "<!DOCTYPE html>
	<html>
	<head>
		<title>Purchase Success</title>
		<link rel='stylesheet' type='text/css' href='styleStore.css'>
	</head>
	<body>
		<h2 id='sTitle'>Welcome to the super car store</h2>
		<p id='sWelcome'>Your username is: ". $username . 
		"<br>Your password is: " . $password .
		 "</p>";
	
	echo "<table><thead><tr>";
	echo "<th></th>";
	echo "<th>Quantity</th>" ; 
	echo "<th>Cost Per Item</th>";
	echo "<th>Sub Total</th></tr></thead>";
	
	echo "<tbody><tr><th>Lamborghini Urus</th>";
	echo "<td>". $urusNum . "</td>";
	echo "<td>$222,004</td>" ;
	echo "<td>$" . ($urusPrice * $urusNum) . "</td>";

	echo "<tbody><tr><th>Mercedez-AMG</th>";
	echo "<td>". $amgNum . "</td>";
	echo "<td>$100,945</td>" ;
	echo "<td>$" . ($amgPrice * $amgNum) . "</td>";

	echo "<tbody><tr><th>Lamborghini Avantador</th>";
	echo "<td>". $avaNum . "</td>";
	echo "<td>$421,321</td>" ;
	echo "<td>$" . ($avantadorPrice * $avaNum) . "</td>";

	echo "<tbody><tr><th>Genesis</th>";
	echo "<td>". $genNum . "</td>";
	echo "<td>$49,925</td>" ;
	echo "<td>$" . ($genesisPrice * $genNum) . "</td>";

	echo "<tbody><tr><th>Koenigsegg Jesko</th>";
	echo "<td>". $jeskoNum . "</td>";
	echo "<td>$3,000,000</td>" ;
	echo "<td>$" . ($jeskoPrice * $jeskoNum) . "</td>";

	echo "<tbody><tr><th>GMC Yukon</th>";
	echo "<td>". $yukonNum . "</td>";
	echo "<td>$51,995</td>" ;
	echo "<td>$" . ($yukonPrice * $yukonNum) . "</td>";	

	echo "<tbody><tr><th>Shipping</th>";
	echo "<td colspan='2'>". $delLabel . "</td>";
	echo "<td>$" . $delivery . "</td>";

	echo "<tbody><tr><th colspan='3'>Total Cost</th>";
	echo "<th>$" . $totalPrice . "</th>";

	echo "</tbody></table>";

	echo "</body>
	</html>";
?>


