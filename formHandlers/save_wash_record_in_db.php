<?php 

if(isset($_POST['save']))
{
	include("../includes/model.php");

	$pdo = new Query();
	$washCategory = $_POST['washCategory'];
	$plateNo = $_POST['plateNo'];
	$wash_cost = $pdo->select_a_wash_category($washCategory)->fetch()['price'];
	$updatedBy = "James";
	$status = "IN";

	if($pdo->save_wash_record($washCategory,$plateNo,$wash_cost,$status,$updatedBy)){
		header("Location: ../dashboard.php?page=dashboard&message=You successfully added or a car for wash");
	}else{
		header("Location: ../dashboard.php?page=dashboard&message=A fatal error occured");
	}

}