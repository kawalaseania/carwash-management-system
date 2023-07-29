		<div class="bg-white px-4 border border-info p-3 shadow-lg ">
			<img src="imgs/bookspingk.jpg" class="img-responsive w-100 my-2">
			<div class="table-responsive">
				<table id="example" class="table table-sm table-stripped table-bordered table-info" >
					<thead class="mt-1" >
						<tr>
							<th>First Name </th>
							<th>Middle Name</th>
							<th>Last Name</th>
							<th>Contact</th>
							<th>Address</th>
							<th>Profile</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include_once("includes/model.php");
						$pdo = new Query();
						$employee = $pdo->select_all_employees();
						while($rows = $employee->fetch()){
							?>
							<tr>
								<td><?=$rows["fName"]?></td>
								<td><?=$rows["mName"]?></td>
								<td><?=$rows["lName"]?></td>
								<td><?=$rows["contact"]?></td>
								<td><?=$rows["address"]?></td>
								<td><a href="employee_profile.php?id=<?=$rows['id']?>&page=employees" class="btn rounded-0 btn-outline-danger">View Provile</a></td>
							</tr>
							<?php 
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>First Name </th>
							<th>Middle Name</th>
							<th>Last Name</th>
							<th>Contact</th>
							<th>Address</th>
							<th>Profile</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>