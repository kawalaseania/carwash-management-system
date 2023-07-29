<?php 
session_start();
if (!isset($_SESSION['isLogin'])) {
	echo "<script>window.location = 'index.php'</script>";
	exit();
}
$title = "Profile";
include("includes/header.php");
// check if there is an id of data to be view 
if(isset($_GET['id'])){
	$id = $_GET['id'];
}else{
	header("Location: dashboard.php?page=dashboard");
}

// include the dp connection and query file
include_once("includes/model.php");
$pdo = new query();
$deatil_arr = $pdo->load_a_single_employee($id)->fetch();

?>

<div id="mySidebar" class="sidebar shadow-lg" style="background-color: black">
	<?php
	include("includes/sidebar_nav.php");
	?>
</div>

<div id="main" class="pt-0 h-100">
	<div class="container py-5 mt-2">
		<div class="row py-2" style="margin-bottom: -5px">
			<div class="col-md-8">
				<?php 
				if(isset($_GET['message'])){
					?>
					<div class="alert alert-success alert-dismissible" data-aos="fade-right" data-aos-duration="2000">
						<?php  echo $_GET['message'] ?>
					</div>
					<?php 
				}else{
					?>
					<h2 class="text-left text-info " data-aos="fade-right" data-aos-duration="2000">Profile of <?=$deatil_arr[1]." ".$deatil_arr[2]." ".$deatil_arr[3]?>  </h2>
					<?php ;
				}
				?>
			</div>
			<div class="col-md-4 text-right ">
				<span class="clip_bar p-4" data-aos="fade-down" data-aos-duration="3000" style="border-top-left-radius: 10px; background-color: #000; border-top-right-radius: 10px;">
					<span class="py-3 px-2">						 
						<button class=" btn rounded-0 btn-outline-info" class="btn btn-info" data-toggle="modal" data-target="#addEmp_form" style="border-left: 2px solid white">Add New</button>
						<button id="openNav" class=" rounded-0 btn btn-outline-info mr-3 " onclick="openNav()">☰ Open Sidebar</button> 
					</span>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 " >
				<div class="card shadow-lg rounded-0" style="border:none;">
					<div class="card-body bg-dark p-3 text-left" >
						<div class="bg-dark p-3">
							<div class="row bg-white px-3">
								<img src="imgs/bookspingk.jpg" class="img-responsive w-100 my-2">
								<div class="col-md-8 offset-md-2">
									<div class="card ">
										<div class="card-body border shadow-sm mt-2 mb-2">
											<center>
												<img src="imgs/userIcon.png" class="img img-fluid rounded-circle">
											</center>
											<table class="table table-sm">
												<tr>
													<td>First Name </td>
													<td><?=$deatil_arr[1]?></td>
												</tr>
												<tr>
													<td>Middle Name </td>
													<td><?=$deatil_arr[2]?></td>
												</tr>
												<tr>
													<td>Last Name </td>
													<td><?=$deatil_arr[3]?></td>
												</tr>
												<tr>
													<td>Sex</td>
													<td><?=$deatil_arr[4]?></td>
												</tr>
												<tr>
													<td>Date of Birth</td>
													<td><?=$deatil_arr[5]?> </td>
												</tr>
												<tr>
													<td>Contact</td>
													<td><?=$deatil_arr[6]?> </td>
												</tr>
												<tr>
													<td>Address</td>
													<td><?=$deatil_arr[7]?> </td>
												</tr>
												<tr>
													<td>Position</td>
													<td><?=$deatil_arr[8]?></td>
												</tr>
												<tr>
													<td>Salary</td>
													<td><?=$deatil_arr[9]?></td>
												</tr>
											</table>
											<a href="deletor.php?idNo=<?=$deatil_arr[0]?>&tb=employees" class="btn btn-danger btn-block shadow-lg">Delete Wash category</a>
										</div>
									</div>							
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



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