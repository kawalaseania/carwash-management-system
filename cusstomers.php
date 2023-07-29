<?php 
session_start();

if (!isset($_SESSION['isLogin'])) {
	echo "<script>window.location = 'dashboard.php'</script>";
	exit();
}
$title = "Customers";
include("includes/header.php");
?>

<div id="mySidebar" class="sidebar shadow-lg" style="background-color: black">
	<?php 
	include("includes/sidebar_nav.php");
	?>
</div>

<div id="main" class="pt-0 h-100">
	<div class="container py-5">
		<div class="row pt-3 pb-3 " style="margin-bottom: -15px">
			<div class="col-md-8">
				<?php 
				if(isset($_GET['message'])){
					?>
					<div class="alert alert-success alert-dismissible" >
						<?php  echo $_GET['message'] ?>
					</div>
					<?php 
				}else{
					?>
					<h2 class="text-left text-Info" data-aos="fade-right" data-aos-duration="2000">Customers Table</h2>
					<?php ;
				}
				?>
			</div>
			<div class="col-md-4 text-right ">
				<span class="clip_bar p-4 bg-dark " data-aos="fade-down" data-aos-duration="3000" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
					<span class=" px-2 ">
						<button class=" btn rounded-0 btn-outline-info" data-toggle="modal" data-target="#add_customer_form"> Add New</button>
						<button id="openNav" class=" rounded-0 btn btn-outline-info mr-2 " onclick="openNav()">☰ Open Sidebar</button>  
					</span>
				</span>
			</div>
		</div>
		<div class="row ">
			<div class="col-md-12 " >
				<div class="card shadow-lg rounded-0" style="border:none;">
					<div class="card-body bg-dark p-3 text-left" >
						<?php include("tables/customers_table.php") ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- include the customer registration form -->
<?php 
include("forms/add_customer.php");
?>

<?php 
include("includes/footer.php");