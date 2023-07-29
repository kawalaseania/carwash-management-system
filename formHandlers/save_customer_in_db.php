<?php 

if(isset($_POST['save'])){
	// collect the data from the form
	$fName = $_POST['fName'];// first name
	$mName = $_POST['mName'];// middle name 
	$lName = $_POST['lName'];// last Name 
	$customerNo = $_POST['customerNo']; // phone number 
	$customerAddr = $_POST['customerAddr'];// address 
	$carType = $_POST['carType'];// car dype or description 
	$plateNo = $_POST['plateNo'];// lescine or plate number 

	// include the database connection and query functions 
	include("../includes/model.php");
	$pdo = new Query(); // initialize query class

	if($pdo->save_new_customer($fName, $carType, $plateNo, $customerNo, $customerAddr, $mName, $lName)){
		header("Location: ../cusstomers.php?page=customers&message=You successfully added a customer");
	}else{
		header("Location: ../cusstomers.php?page=customers&message=An error occured while tryna add customer");
	}
}