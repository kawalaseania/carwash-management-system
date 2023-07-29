

<div class="modal fade" id="addCategory">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add New Category</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form method="post" action="formHandlers/save_wash_category.php">
					<input type="text" name="washType" class="border border-info form-control form-control-lg" placeholder="Wash type or category" required>
					<input type="number" name="price" class="border-info border form-control form-control-lg mt-2" placeholder="Wash cost or price" required>
					<center>
						<input name="save" type="submit" value="Save Customer info" class=" mt-3 px-5 btn btn-info" style="border-radius:10px !important " name="saveCustomer">
					</center>
				</form>
			</div>
		</div>
	</div>
</div>