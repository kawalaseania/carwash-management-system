<?php 
session_start();

if (!isset($_SESSION['isLogin'])) {
	echo "<script>window.location = 'index.php'</script>";
	exit();
}


$title = "Details";
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
$deatil_arr = $pdo->load_single_wash_log($id)->fetch();
									
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
					<h2 class="text-left text-info " data-aos="fade-right" data-aos-duration="2000">Wash Log Details of <?=$deatil_arr[7]." ".$deatil_arr[8]." ".$deatil_arr[9]?> </h2>
					<?php ;
				}
				?>
			</div>
			<div class="col-md-4 text-right ">
				<span class="clip_bar p-4" data-aos="fade-down" data-aos-duration="3000" style="border-top-left-radius: 10px; background-color: #000; border-top-right-radius: 10px;">
					<span class="py-3 px-2">						 
						<button class=" btn rounded-0 btn-outline-info" data-toggle="modal" data-target="#logWashRecord" style="border-left: 2px solid white">Add New</button>
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
								<div class="col-md-8">
									<?php 
									include_once("includes/model.php");
									$pdo = new query();
									$deatil_arr = $pdo->load_single_wash_log($id)->fetch();
									//print_r($deatil_arr);
									?>
									<table class="table w-100 table-hover bg-white table-sm bordered">
										<tr>
											<td class="lead">Owner Name</td>
											<td class="lead tex-info"><?=$deatil_arr[7]." ".$deatil_arr[8]." ".$deatil_arr[9]?></td>
										</tr>
										<tr>
											<td class="lead">Plate Number</td>
											<td class="lead tex-info"><?=$deatil_arr["contact"]?></td>
										</tr>
										<tr>
											<td class="lead">Plate Number</td>
											<td class="lead tex-info"><?=$deatil_arr["plateNo"]?></td>
										</tr>
										<tr>
											<td class="lead">Wash Category</td>
											<td class="lead tex-info"><?=$deatil_arr[1]?></td>
										</tr>
										<tr>
											<td class="lead">Cost of Wash</td>
											<td class="lead tex-info"><?=$deatil_arr[3]?></td>
										</tr>
										<tr>
											<td class="lead">Status</td>
											<td class="lead tex-info"><?=$deatil_arr[4]?></td>
										</tr>
										<tr>
											<td class="lead ">Last updated</td>
											<td class="lead tex-info"><?=$deatil_arr[5]?></td>
										</tr>
										<tr>
											<td class="lead">Updated By</td>
											<td class="lead tex-info"><?=$deatil_arr[6]?></td>
										</tr>
										
									</table>
								</div>
								<div class="col-md-4">
									<div class="card-body shadow-lg m-2">
										<p>Select the update category and click the "Save Update" button if you wish to</p>
										<form action="formHandlers/update_wash_record.php" method="post">
											<input type="hidden" value="<?=$deatil_arr[2]?>" name="id">
											<select name="status" class=" text-left form-control form-control-lg border border-info" required >
												<option value="" >choose to update status </option>
												<option value="Completed" >Completed </option>
												<option value="Paid" >Paid </option>
												<option value="Out" >Out</option>
											</select>
											<button name="save" class="btn btn-info mt-2 btn-block">Save Update</button>
										</form>
										<hr>
										<p class="mt-3 text-secondary">If you delete this record, you will not access it again.</p>
										<a href="deletor.php?idNo=<?=$deatil_arr[2]?>&tb=wash_log" class="btn btn-danger btn-block">Action</a>
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

<?php 

include("forms/log_a_wash_record.php");
include("includes/footer.php");