

<div class="modal fade" id="logWashRecord">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add car for wash</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php 
          include_once("includes/model.php");
          $pdo = new Query();
          $plateNo_array = $pdo->load_all_customers();
          $washCategories_array = $pdo->load_all_wash_category();
        ?>
        <form  method="post" action="formHandlers/save_wash_record_in_db.php">
        <select name="plateNo" class="form-control form-control-lg border border-info" style="text-align: left !important">
          <option value="">Choose Plate No.</option>
          <?php
            while($row = $plateNo_array->fetch()){
              ?>
                <option value="<?=$row['plateNo']?>"><?=$row['plateNo']?></option>
              <?php 
            }
           ?>
        </select>
        <select name="washCategory" class=" mt-4 form-control form-control-lg border border-info" style="text-align: left !important">
          <option value="">Choose wash type</option>
          <?php
            while($row = $washCategories_array->fetch()){
              ?>
                <option value="<?=$row['categoryName']?>"><?=$row['categoryName']?></option>
              <?php 
            }
           ?>
        </select>
        <center>
          <input type="submit" name="save" value="Log in car for wash" class=" mt-3 border border-info mt-3 px-5 btn btn-info" style="border-radius:10px !important " name="saveCustomer">
        </center>
      </form>
      </div>
    </div>
  </div>
</div>