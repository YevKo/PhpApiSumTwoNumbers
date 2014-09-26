<?php 
/**
* This api handles a simple addition of two numbers that passed with GET request and returns their sum. 
* 
* @param  number_one - numerical value
* @param  number_two - number
* @return string $result
*/
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	// if one of the input nubers is not set shows error
	if (!isset($_GET['number_one']) && !isset($_GET['number_two'])){
		http_response_code(400);
		echo "Please, enter two numbers.";
		exit;
	}

	// get the two numbers from request
	$number_one = trim($_GET['number_one']);
	$number_two = trim($_GET['number_two']);
	
	// if one of the input is not a nuber shows error
	if(!is_numeric($number_one) || !is_numeric($number_two)){
		http_response_code(400);
		echo "Please, enter valid numbers.";
		exit; 
	}
	
	// calculate the sum of numbers and return result
	$result = $number_one + $number_two;
	http_response_code(200);
	echo $result;	

 } else {
	// if not a GET request passed shows error
	http_response_code(403);
	echo "Only GET method allowed";
 }

?>
