<?php 
session_start();

if (!isset($_SESSION['isLogin']) && $_SESSION['userType'] !== "Administrator") {
	echo "<script>window.location = 'dashboard.php'</script>";
	exit();
}
$title = "Employees";
include("includes/header.php");
?>

<div id="mySidebar" class="sidebar shadow-lg" style="background-color: black">
	<?php 
	include("includes/sidebar_nav.php");
	?>
</div>

<div id="main" class="pt-0 h-100">
	<div class="container py-5">
		<div class="row  pt-3 pb-3 " style="margin-bottom: -15px">
			<div class="col-md-8 ">
				<?php 
				if(isset($_GET['message'])){
					?>
					<div class="alert alert-success alert-dismissible" >
						<?php  echo $_GET['message'] ?>
					</div>
					<?php 
				}else{
					?>
					<h2 class="text-left " data-aos="fade-right" data-aos-duration="2000" >Employees Table</h2>
					<?php ;
				}
				?>
			</div>
			<div class="col-md-4 text-right ">
				<span class="clip_bar bg-dark p-4" data-aos="fade-down" data-aos-duration="3000" style="border-top-left-radius: 10px; background-color: #000 border-top-right-radius: 10px;">
					<span class="py-3 px-2">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addEmp_form">
							Add New
						</button>
						<button id="openNav" class=" rounded-0 btn btn-outline-info mr-2 " onclick="openNav()">☰ Open Sidebar</button> 
					</span>
				</span>
			</div>
		</div>
		<div class="row ">
			<div class="col-md-12 " >
				<div class="card shadow-lg rounded-0" style="border:none;">
					<div class="card-body bg-dark p-3 text-left" >
						<?php include("tables/employee_table.php") ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MODAL CONTAINING THE FORM -->

<!-- The Modal -->
<div class="modal fade" id="addEmp_form">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header bg-dark">
				<h4 class="modal-title text-info">Add Employee</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<?php
					include("forms/add_employee_form.php");
				?>
			</div>
		</div>
	</div>
</div>

<?php 
include("includes/footer.php");