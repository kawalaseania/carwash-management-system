<?php 


if(isset($_GET['tb']) && isset($_GET['idNo'])){

	include_once('includes/model.php');

	$table_name = $_GET['tb'];
	$product_ID = $_GET['idNo'];

	$handler = new Query();
	if($handler->delete_item($table_name, $product_ID)){
		header("location: dashboard.php?message=You deleted an item from the database successfully");
	}else{
		header("location: dashboard.php?message=A fatal error occured");
		
	};

}else{
		header("location: dashboard.php?message=A fatal error occured");
}