<?php 

	libxml_use_internal_errors(true);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$question1 = $_POST["KScap"];
	$question2 = $_POST["NYcap"];
	$question3 = $_POST["MOcap"];
	$question4 = $_POST["COcap"];
	$question5 = $_POST["CAcap"];
	$question6 = $_POST["WAcap"];

	//$ans1 

	$points = 0;

	if($question1 == "Topeka"){
		$points += 20;
	}
	if($question2 == "Albany"){
		$points += 20;
	}
	if($question3 == "Jefferson City"){
		$points += 20;
	}
	if($question4 == "Denver"){
		$points += 20;
	}
	if($question5 == "Sacramento"){
		$points += 20;
	}
	if($question6 == "Olympia"){
		$points += 20;
	}

	$score = ($points/120) * 100;

	$result1 = "<p class='answer'>Question 1: What is the capital of Kansas?<br>";
	$result1 .= "Your answer: ". $question1;
	$result1 .= "<br>Correct answer: Topeka</p>";

	$result2 = "<p class='answer'>Question 2: What is the capital of New York??<br>";
	$result2 .= "Your answer: ". $question2;
	$result2 .= "<br>Correct answer: Albany</p>";

	$result3 = "<p class='answer'>Question 3: What is the capital of Missouri?<br>";
	$result3 .= "Your answer: ". $question3;
	$result3 .= "<br>Correct answer: Jefferson City</p>";

	$result4 = "<p class='answer'>Question 4: What is the capital of Colorado?<br>";
	$result4 .= "Your answer: ". $question4;
	$result4 .= "<br>Correct answer: Denver</p>";

	$result5 = "<p class='answer'>Question 5: What is the capital of California?<br>";
	$result5 .= "Your answer: ". $question5;
	$result5 .= "<br>Correct answer: Sacramento</p>";

	$result6 = "<p class='answer'>Question 6: What is the capital of Washington?<br>";
	$result6 .= "Your answer: ". $question6;
	$result6 .= "<br>Correct answer: Olympia</p>";

	echo "<p class='score'><strong>You earned " . $score . " % </strong></p>";

	echo "{$result1}";
	echo "{$result2}";
	echo "{$result3}";
	echo "{$result4}";
	echo "{$result5}";
	echo "{$result6}";

?>