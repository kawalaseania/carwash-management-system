		<div class="bg-white px-4 border border-info p-3 shadow-lg ">
			<img src="imgs/bookspingk.jpg" class="img-responsive w-100 my-2">
			<div class="table-responsive">
				<table id="example" class="table table-sm table-stripped " >
					<thead class="mt-1" >
						<tr>
							<th>Customer </th>
							<th>Car Type</th>
							<th>Plate No.</th>
							<th>Contact</th>
							<th>Address</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include_once("includes/model.php");
						$pdo = new Query();
						$customers = $pdo->select_all_customers();
							//print_r($wash_records->fetch());
						while($rows = $customers->fetch()){
							?>
							<tr>
								<td><?=$rows["fName"]?></td>
								<td><?=$rows["carType"]?></td>
								<td><?=$rows["plateNo"]?></td>
								<td><?=$rows["contact"]?></td>
								<td><?=$rows["address"]?></td>
								<td><a href="deletor.php?idNo=<?=$rows['id']?>&tb=customers" class="btn btn-danger rounded-0">Delete</a></td>
							</tr>
							<?php 
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>Customer </th>
							<th>Car Type</th>
							<th>Plate No.</th>
							<th>Contact</th>
							<th>Address</th>
							<th>Delete</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>