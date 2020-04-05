<div class="col-lg-12">
    <h2><center><?php echo $title; ?></center></h2>
    <div class="container">
        <h2>Shipping Charges</h2>
        <table class="table table-hover table-bordered table-striped">
          <tr>
              <th>
                  Sr_id
              </th>
              <th>
                  Shipping Charges
              </th>
              <th colspan="2">
                  Action
              </th>
          </tr>
                <?php
                        echo '<tr>';
                        echo '<td> 1 </td>';
                        echo '<td id="disp_row"><input type"text" class="form-control"  readonly value='.$result->shipping_charge.'></td>';
                        echo '<td id="edit_row" style="display:none"><input type"text" class="form-control" id="shippin_charges" name="shippin_charges" value='.$result->shipping_charge.' pattern="[0-9]{1,3}"></td>';
                        // echo '<td><a href="'.site_url('main/changelevel').'"><button type="button" class="btn btn-primary">Role</button></a></td>';
                        echo '<td><button type="button" id="edit_b" class="btn btn-primary" onclick="editCharge()">Edit</button>&nbsp;&nbsp;&nbsp; <button type="button" id="update_b" class="btn btn-primary" style="display:none;" onclick="saveCharge()">Update</button></td>';
                        echo '</tr>';
                ?>
        </table>
    </div>
  </div>

  <script>
    function editCharge(){
      $('#edit_row').show('fast');
      $('#disp_row').hide('fast');
      $('#edit_b').hide('fast');
      $('#update_b').show('fast');
      $('#shippin_charges').focus();
    }
    function saveCharge(){
       var charges = $('#shippin_charges').val();
       var old_charges = '<?php echo $result->shipping_charge; ?>';
       if(charges =='' || charges == null){
        alert('Please input charges.');
       }else if(charges == old_charges){
        alert('No Changes for updation..');
       }else if( $.isNumeric(charges) == false){
        alert('Please enter valid amount.');
       }else{
        $.post( "<?php echo site_url('main/updateCharges'); ?>", { charges: charges })
          .done(function( data ) {
            alert(data);
            location.reload();
          });
       }
    }
  </script>