<?php

// start the session at the initial stage 

session_start();

// check if the visitor/user or what you might call it is logged in 
// if they are, direct them to the dash board. if not show the login form
if(isset($_SESSION['isLogin'])){
	header("Location: dashboard.php");
}
// make sure to give the page dynamic page title here as shown below
$title = "login";

// login initial variable values
// here I set them blank
$error = "";
$email_error = "";

// include the page or site header file
include 'includes/header.php';

// if the user presses the login button 
if(isset($_POST['login'])){

// get the email  and password value from the form 
	$email = $_POST['email'];
	$password = $_POST['password'];

// validate inputs submitted 
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = 0;
	} else {
		$email_error = "Your email is not valid";
		$error = 1;
	}


	// include this file which contains the db connections and sql query statements as well
	include("includes/model.php");

	//initiate the query class 
	$loginobj = new Query();

	// check if there is an error from user's input 
	if($error !== 1){
		// check if user email exist 
		if($loginobj->login($email)->rowCount() > 0 ){

			$user_data = $loginobj->login($email)->fetch();

			print_r($user_data);
			if(password_verify($password, $user_data[10])){
				$_SESSION['loginId'] = $user_data[0];
				$_SESSION['isLogin'] = "Yes";
				header("Location: dashboard.php?message=Welcome to spark carwash");
			}else{
				echo "<script>alert('Wrong password')</script>";
			}
		}else{
			echo "<script>alert('Your credentials does not match any user of our system')</script>";
		 }
	}



}

?>

<div class="container-fluid  " style="height: 100vh;">
	<div class="row h-100 align-items-center">
		<div class="col-md-4 offset-md-4" >
			<div class="card p-4 text-center" style="border-radius: 20px" >
				<div class="card-header text-center bg-white" style="border: none;">
					<h4 style="font-family: myFirstFont;">Clearn Carwash</h4>
				</div>
				<form method="POST" action="index.php">
					<div class="card-body text-center" style="padding-bottom: 100px">
						<input type="email" name="email" placeholder="Email" class=" text-white bg- transparent text-primary form-control form-control-lg rounded-0 p-4 required">
						<small class="text-danger mb-4"><?php echo $email_error; ?></small>
						<br><br>
						<input type="password" name="password" placeholder="Password" class="text-white bg-transparent text-primary form-control mb-4 form-control-lg rounded-0 p-4 required">
						<button name="login" class="btn btn-lg btn-block my-btn">Login</button>
						<a href="index.php" class="btn btn-block my-btn-outline mt-3" style="">Forgot password</a>
						<a href="#" class="mt-4 text-secondary lead " style="">Terms and policies</a>
						
					</div>
				</form>

			</div>
		</div>
	</div>
</div>




