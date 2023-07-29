		<div class="bg-white px-4 ">
			<img src="imgs/bookspingk.jpg" class="img-responsive w-100 my-2">
			<div class="table-responsive">
				<table id="example" class="table table-sm" >
					<thead class="mt-1" >
						<tr>
							<th>Car Owner</th>
							<th>Contact </th>
							<th>Car Plate No.</th>
							<th>Wash Category</th>
							<th>Cost</th>
							<th>Status</th>
							<th>Last Updated</th>
							<th>More</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include_once("includes/model.php");
						$pdo = new Query();
						$wash_records = $pdo->load_wash_record_table();
							//print_r($wash_records->fetch());
						while($rows = $wash_records->fetch()){
							?>
							<tr>
								<td><?=$rows["fName"]?></td>
								<td><?=$rows["contact"]?></td>
								<td><?=$rows["plateNo"]?></td>
								<td><?=$rows["washCategory"]?></td>
								<td><?=$rows["washCost"]?></td>
								<td><?=$rows["status"]?></td>
								<td><?=substr($rows["lastUpdate"], 0,16)?></td>
								<td><a href="wash_log_details.php?id=<?=$rows['id']?>" class="btn btn-info">Action</button></td>
							</tr>
							<?php 
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>Car Owner</th>
							<th>Contact </th>
							<th>Car Plate No.</th>
							<th>Wash Category</th>
							<th>Cost</th>
							<th>Status</th>
							<th>Last Updated</th>
							<th>More</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>