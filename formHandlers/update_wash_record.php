<?php 
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$status = $_POST['status'];

	// include the database connection and query functions 
	include("../includes/model.php");
	$pdo = new Query(); // initialize query class

	if($pdo->update_wash_log($id, $status)){
		header("Location: ../dashboard.php?page=dashboard&message=You successfully update a record");
	}else{
		header("Location: ../dashboard.php?page=dashboard&message=An error occured while tryna update");
	}
}else{

}