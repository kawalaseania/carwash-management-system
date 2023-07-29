<?php 
session_start();

if (!isset($_SESSION['isLogin'])) {
	echo "<script>window.location = 'index.php'</script>";
}
$title = "Categories";
include("includes/header.php");
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
					<h2 class="text-left text-info " data-aos="fade-right" data-aos-duration="2000">Categories of washes/services</h2>
					<?php ;
				}
				?>
			</div>
			<div class="col-md-4 text-right ">
				<span class="clip_bar p-4" data-aos="fade-down" data-aos-duration="3000" style="border-top-left-radius: 10px; background-color: #000; border-top-right-radius: 10px;">
					<span class="py-3 px-2">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addCategory">
							Add New
						</button>
						<button id="openNav" class=" rounded-0 btn btn-outline-info mr-3 " onclick="openNav()">☰ Open Sidebar</button> 
					</span>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 " >
				<div class="card shadow-lg rounded-0" style="border:none;">
					<div class="card-body bg-dark p-3 text-left" >
						<?php 
						include("forms/add_category.php");
						include("tables/wash_categories_table.php");
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 

include("includes/footer.php");