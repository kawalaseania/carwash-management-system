
<!-- The Modal -->
<div class="modal fade" id="add_customer_form">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-dark">
        <h4 class="modal-title text-white">Register A Customer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="formHandlers/save_customer_in_db.php">
          <div class="row">
            <div class="col-4">
              <input type="text" name="fName" class="form-control form-control-lg mt-3 border border-info rounded" placeholder="First Name" required>
            </div>
            <div class="col-4">
              <input type="text" name="mName" class="form-control form-control-lg mt-3 border border-info rounded" placeholder="Middle Name" required>
            </div>
            <div class="col-4">
              <input type="text" name="lName" class="form-control form-control-lg mt-3 border border-info rounded" placeholder="Last Name" required>
            </div>
          </div>

          <input type="text" name="customerNo" class="form-control form-control-lg mt-3 border border-info rounded" placeholder="Customer Number" required>

          <input type="text" name="customerAddr" class="form-control form-control-lg mt-3 border border-info rounded" placeholder="Customer Address " required>

          <div class="row">
           <div class="col-6">
             <input type="text" name="carType" class="form-control form-control-lg mt-3 border border-info rounded" placeholder="Customer car name or description" required>
           </div>
           <div class="col-6">
             <input type="text" name="plateNo" class="form-control form-control-lg mt-3 border border-info rounded" placeholder="Car plate No." required>
           </div>
         </div>

         <center>
           <input type="submit" name="save" value="Save Customer info" class=" mt-3 px-5 btn btn-info" style="border-radius:10px !important " name="saveCustomer">
         </center>

       </form>
     </div>
   </div>
 </div>
</div>