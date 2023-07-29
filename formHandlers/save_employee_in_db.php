<?php 

if(isset($_POST["save"])){

	$fName = $_POST['fName'];
	$mName = $_POST['mName'];
	$lName = $_POST['lName'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$position = $_POST['position'];
	$salary = $_POST['salary'];
	$password =  password_hash($_POST['password'], PASSWORD_DEFAULT);

	include("../includes/model.php");
	$pdo = new Query(); // initialize query class

	if($pdo->save_new_employee($fName,$mName, $lName,$gender,$dob,$contact,$address,$email,$position,$salary,$password)){
		header("Location: ../employees.php?page=employees&message=You successfully added an employee");
	}else{
		header("Location: ../employees.php?page=employees&message=An error occured while tryna add employee");
	}
	
}else{

}