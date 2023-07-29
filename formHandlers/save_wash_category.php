<?php 

if(isset($_POST['save'])){
	// load the database connections and query files 
	include("../includes/model.php");
	$pdo = new Query(); // initialize query class

	//get the post variables from the form 
	$categoryName = $_POST['washType'];
	$price = $_POST['price'];

	// if the data is being saved 
	if($pdo->save_wash_category($categoryName, $price)){
		header("Location: ../wash_categories.php?page=categories&message=You successfully added a category");
	}else{
		header("Location: ../wash_categories.php?message=An error occured while tryna add category");
	}

}else{
	header("Location: ../wash_categories.php");
}