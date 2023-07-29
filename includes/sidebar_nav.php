<?php 
	function active_class($link){

    $active_page = "";

    if(isset($_GET['page'])){
      $active_page = $_GET['page'];
    }else{
      $active_page = 'dashboard';
    }

    if($link == $active_page){
      echo "btn-info";
    }else{
    	echo "btn-outline-info";
    }

  }
?>

<a href="javascript:void(0)" class="" onclick="closeNav()">
	<img src="imgs/carwash_logo.png" class="img-fluid bg-transparent img-responsive mb-4">
</a>
<div class="p-4">
	<a href="dashboard.php?page=dashboard" class="<?=active_class("dashboard")?> btn mt-3 "> Dashboard</a>
	<a class="<?=active_class("customers")?> btn mt-2" href="cusstomers.php?page=customers">Customers</a>
	<a class="<?=active_class("categories")?> btn mt-2" href="wash_categories.php?page=categories">Wash Categories</a>
	<a class="<?=active_class("employees")?> btn mt-2" href="employees.php?page=employees">Employees</a>
  <a href="employee_profile.php?id=<?=$_SESSION['loginId']?>&page=profile" class="btn rounded-0  btn mt-2 <?=active_class("profile")?>">View profile</a>
	<a class="btn-outline-info btn mt-2" href="logout.php"> Logout</a>
</div>
