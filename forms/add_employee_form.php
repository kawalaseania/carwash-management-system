<form method="post" id="empForm" action="formHandlers/save_employee_in_db.php">
	<div id="stageOne">
		<div class="progress mb-3">
		<div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width:50%"></div>
		</div>

		<div class="row">
			<div class="col-4">
				<input type="text" id="fName" name="fName" class="form-control text-left form-control-lg border rounded border-info bg-transparent" placeholder="Emp. First Name ">
			</div>
			<div class="col-4">
				<input type="text" id="mName" name="mName" class="form-control text-left form-control-lg border rounded border-info bg-transparent" placeholder="Emp. Middle Name ">
			</div>
			<div class="col-4">
				<input type="text" id="lName" name="lName" class="form-control text-left form-control-lg border rounded border-info bg-transparent" placeholder="Emp.  Last Name ">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-6">
				<small>Employee's Gender</small>
				<select name="gender" id="gender" class="form-control text-left form-control-lg border rounded border-info bg-transparent">
					<option value="">Choose</option>
					<option value="M">Male</option>
					<option value="F">Female</option>
				</select>
			</div>
			<div class="col-6">
				<small>Employee's Date of Birth</small>				
				<input type="date" id="dob" name="dob" class="form-control text-left form-control-lg border rounded border-info bg-transparent">
			</div>
		</div>

		<input type="number" id="contact" name="contact" class="form-control text-left border form-control-lg mt-3  rounded border-info bg-transparent" placeholder="Employeer's Phone Number ">

		<input type="text" id="address" name="address" class="form-control text-left border form-control-lg mt-3  border-info bg-transparent rounded" placeholder="Employeer's Address">

		<center>
			<input id="stageOneBtn" type="button" class="px-5 btn btn-info  text-left mt-3" value="Proceed to next stage" style="border-radius: 15px !important">
		</center>
	</div>

	<div id="stageTwo" style="display: none">
		<div class="progress mb-3">
		<div class="progress-bar progress-bar-striped progress-bar-animated" style="width:100%"></div>
		</div>

		<input type="email" id="email" name="email" class="form-control form-control-lg text-left mt-3 border border-info bg-transparent rounded" placeholder="Employeer's Email">

		<div class="row">
			<div class="col-6">
				<select id="position" name="position" class="mt-3 form-control-lg text-left form-control border border-info" required>
					<option value="">Choose position</option>
					<option value="Security guard">Ordinary User/employee</option>
					<option value="Car Washer">Car Washer</option>
					<option value="Driver">Driver</option>
					<option value="Admin">Administrator</option>
				</select>
			</div>
			<div class="col-6">
				<input type="number" id="salary" name="salary" class="form-control form-control-lg text-left mt-3 border border-info bg-transparent rounded" placeholder="Employeer's Salary">
			</div>
		</div>
		<input type="password" id="password" name="password" class="form-control form-control-lg text-left mt-3 border border-info bg-transparent rounded" placeholder="Employeer's password">

		<div class="row">
			<div class="col-6">
				<button id="Submit" name="save" class="btn text-left btn-info btn-block btn-lg mt-3">Submit or Save Info</button>
			</div>
			<div class="col-6">
				<input id="backBtn" type="button" class="btn text-left btn-outline-danger btn-block btn-lg mt-3" value="Go back to stage one">
			</div>
		</div>
	</div>
</form>


<script type="text/javascript">
	// FOR VALIDATION AND ANIMATION SCRIPT 
	$(document).ready(function(){
		// if the proceed btn is clicked
		$("#stageOneBtn").click(function(){
			let err = 0;
			let fName = $("#fName").val();
			let lName = $("#lName").val();
			let contact = $("#contact").val();
			let address = $("#address").val();
			let gender = $("#gender").val();
			let dob = $("#dob").val();

			// validate username 
			if(lName == "" || lName.length < 3){
				err+= 1;
				alert("User first too short or empty. It should contains more than 3 characters");
			}

			// validate username 
			if(fName == "" || fName.length < 3){
				err+= 1;
				alert("User first too short or empty. It should contains more than 3 characters");
			}

			// validate phone number 
			if(contact == "" || contact.length < 10){
				err+= 1;
				alert("Contact can not be empty or less than ten characters");
			}

			// validate address 
			if(address == "" || address.length < 10){
				err+= 1;
				alert("Address can not be empty or less than ten characters");
			}

			// validate gender 
			if(gender == ""){
				err+= 1;
				alert("Please Choose Gender");
			}

			// validate date of birth 
			if(dob == ""){
				err+= 1;
				alert("Give the date of birth");
			}


			// if there is no error, proceed to next stage
			if(err == 0){

				$("#stageOne").fadeOut();
				$("#stageTwo").fadeIn(1500);
			}
		});

		// if the back button is pressed
		$("#backBtn").click(function(){
			$("#stageTwo").fadeOut();
			$("#stageOne").fadeIn(1500);
		});

		// The form is submitted
		$("#Submit").click(function(){

			let err = 0;
			let email = $("#email").val();
			let password = $("#password").val();
			let position = $("#position").val();
			let salary = $("#salary").val();

			// this function validate the email 
			function IsEmail(mail) {
				var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if(!regex.test(mail)) {
					err+= 1;
					alert("wrong email");
				}
			}
			IsEmail(email);

			// validate the password
			if(password == "" || password.length < 5){
				err+= 1;
				alert("Password can not be empty or less than ten characters");
			}

			// validate the account type or the position
			if(position == "" || position.length < 5){
				err+= 1;
				alert("User position or account type is required.");
			}

			if(salary == "" || salary.length < 2){
				err+= 1;
				alert("User position or account type is required.");
			}

			if(err == 0){
				$("#empForm").submit();
			}

		});



	});

	
</script>