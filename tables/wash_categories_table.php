		<div class="bg-white px-4 ">
			<img src="imgs/bookspingk.jpg" class="img-responsive w-100 my-2">
			<div class="table-responsive">
				<table id="example" class="table table-sm" >
					<thead class="mt-1" >
						<tr>
							<th>Wash Category</th>
							<th>Price</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include_once("includes/model.php");
						$pdo = new Query();
						$categories = $pdo->load_all_wash_category();
						while($rows = $categories->fetch()){
							?>
							<tr>
								<td><?=$rows["categoryName"]?></td>
								<td><?=$rows["price"]?></td>
								<td class="text-right"><a href="deletor.php?idNo=<?=$rows['id']?>&tb=washcategory" class="btn btn-danger shadow-lg">Delete Wash category</a></td>
							</tr>
							<?php 
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>Wash Category</th>
							<th>Price</th>
							<th>Delete</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>