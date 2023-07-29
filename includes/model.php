<?php 

include 'connect.php'; // include the file that connects to the database

Class Query extends Dbh {


// this method varify if the person is a ligetimate login user
	public function login($email){
		$stmt = $this->connection()->prepare('SELECT * FROM employees WHERE email = ?'); 
		$stmt->execute([$email]);
		return $stmt;
	}

	// save the categories of wash in the database method/function
	public function save_wash_category($categoryName, $price){
		$sql = "INSERT INTO washcategory(categoryName, price)VALUES (?,?)";
		$stmt = $this->connection()->prepare($sql);
		$stmt = $stmt->execute([$categoryName, $price]);
		return $stmt;
	}

	// this method updates a wash status 
	public function update_wash_log($id, $status){
		$sql = "UPDATE wash_log SET status = ? WHERE id = ?";
		$stmt = $this->connection()->prepare($sql);
		$stmt = $stmt->execute([$status, $id]);
		return $stmt;
	}

	// save the customer information or data in the database method/function 
	public function save_new_customer($fName, $carType, $plateNo, $contact, $address, $mName, $lName){
		$sql = "INSERT INTO customers(fName, carType, plateNo, contact, address, mName, lName)VALUES (?,?,?,?,?,?,?)";
		$stmt = $this->connection()->prepare($sql);
		$stmt = $stmt->execute([$fName, $carType, $plateNo, $contact, $address, $mName, $lName]);
		return $stmt;
	}

	// save the employee information in the database - method 
	public function save_new_employee($fName,$mName, $lName,$gender,$dob,$contact,$address,$email,$position,$salary,$password){
		$sql = "INSERT INTO employees(fName,mName,lName,gender,dob,contact,address,email,position,salary,password)VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->connection()->prepare($sql);
		$stmt = $stmt->execute([$fName,$mName, $lName,$gender,$dob,$contact,$address,$email,$position,$salary,$password]);
		return $stmt;
	}

	// this method save new wash log.

	public function save_wash_record($washCategory,$plateNo,$wash_cost,$status,$updatedBy){
		$sql = "INSERT INTO wash_log(washCategory,plateNo,washCost,status,updateBy)VALUES (?,?,?,?,?)";
		$stmt = $this->connection()->prepare($sql);
		$stmt = $stmt->execute([$washCategory,$plateNo,$wash_cost,$status,$updatedBy]);
		return $stmt;
	}

//select all the customers from the database 
	public function load_all_customers(){
		$stmt = $this->connection()->query("SELECT * FROM customers");
		return $stmt;
	}
// load or select all the wash categories from the database 
	public function load_all_wash_category(){
		$stmt = $this->connection()->query("SELECT * FROM washcategory");
		return $stmt;

	}

	// select all the employees from the database 
	public function select_all_employees(){
		$stmt = $this->connection()->query("SELECT * FROM employees");
		return $stmt;

	}

	// select all wash records tables
	public function load_wash_record_table(){
		$stmt = $this->connection()->query("
			SELECT wash_log.plateNo, wash_log.washCategory, wash_log.id, wash_log.washCost, wash_log.status, wash_log.lastUpdate, wash_log.updateBy, customers.fName, customers.mName, customers.lName, customers.contact FROM wash_log INNER JOIN customers ON customers.plateNo = wash_log.plateNo
			");
		return $stmt;
	}

	// select all customers from database 
	public function select_all_customers(){
		$stmt = $this->connection()->query("SELECT * FROM customers");
		return $stmt;
	}

	// load or select a single wash categories from the database 
	public function select_a_wash_category($categoryName){
		$stmt = $this->connection()->prepare('SELECT * FROM washCategory WHERE categoryName = ?'); 
		$stmt->execute([$categoryName]);
		return $stmt;
	}

	public function load_single_wash_log($id){
		$sql = "SELECT wash_log.plateNo, wash_log.washCategory, wash_log.id, wash_log.washCost, wash_log.status, wash_log.lastUpdate, wash_log.updateBy, customers.fName, customers.mName, customers.lName, customers.contact FROM wash_log INNER JOIN customers ON customers.plateNo = wash_log.plateNo WHERE wash_log.id = ?";
		$stmt = $this->connection()->prepare($sql); 
		$stmt->execute([$id]);
		return $stmt;
	}

	// select employee profile
	public function load_a_single_employee($id){
		$sql = "SELECT * FROM employees WHERE id = ?";
		$stmt = $this->connection()->prepare($sql); 
		$stmt->execute([$id]);
		return $stmt;
	}

	// delee work
	public function delete_item($table, $id){
		$stmt = $this->connection()->prepare("DELETE FROM $table WHERE id = ?");
		$stmt->execute([$id]);
		return $stmt;
	}// this will delete any item in any table base on the table name and id passed





// public function view_call_detail($id){
// 	$stmt = $this->connection()->prepare("SELECT * FROM call_log WHERE id = ?"); 
// 	$stmt->execute([$id]);
// 	return $stmt;
// }// this method will select and load all sale record in the admin table 




}
