    <div class="container">
      <div class="row">
        <div class="col-sm-10">
        <h2><?php echo $title ?></h2>
        </div>
      </div>
        <table class="table table-hover table-bordered table-striped">
          <tr>
              <th>
                  Order ID
              </th>
              <th>
                  Custome Name
              </th>
              <th>
                  Shipping Address
              </th>
              <th> 
                  Order Total
              </th>
              <th>
                  Order Date
              </th>
              <th>
                  Order Status
              </th>
              <th colspan="2">
                  Action
              </th>
          </tr>
                <?php
                    if(is_array($orderlist)){
                      foreach($orderlist as $row){
                        if($row->order_status==1){$order_status ='New Order';}else if($row->order_status == 2 ){$order_status ='Delivered';}else{$order_status ='Cancelled';}  
                        echo '<tr>';
                        echo '<td>'.$row->order_id.'</td>';
                        echo '<td>'.$row->first_name.' '.$row->last_name.'</td>';
                        echo '<td>'.str_replace("*", " ", $row->shipping_address).'</td>';
                        echo '<td>'.$row->order_total.'</td>';
                        echo '<td>'.gmdate("d-m-Y",$row->order_date).'</td>';
                        echo '<td>'.$order_status.'</td>';
                        echo '<td><a href="#" data-toggle="modal" data-target="#exampleModal_'.$row->o_id.'" style="font-size: x-large;padding: 0px 7px 0px 7px;"><i class="fa fa-eye" aria-hidden="true"></i></a> | 
                                  <a style="font-size: x-large;color:red;"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>';
                        echo '</tr>';
                        // <a href="'.site_url('products/productdelete/'.$row->o_id).'" onClick="return confirm(Are You sure to delete this ?);"  name="deleteproduct">
                        ?>
                    <?php }
                  }else{
                    echo '<tr><td colspan="7"><center> No Records </center></td></tr> ';
                  }
                ?>
        </table>
    </div>
    <?php if(is_array($orderlist)){
           foreach($orderlist as $row){ ?>
    <div class="modal fade" id="exampleModal_<?php echo $row->o_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h4 class="modal-title" id="exampleModalLabel">Order ID:<?php echo $row->order_id ?></h4>
           <h4 class="modal-title" id="exampleModalLabel">Date<?php echo gmdate("d-m-Y",$row->order_date); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <label>Customer Name</label>
                <input type="text" readonly value="<?php echo $row->first_name.' '.$row->last_name; ?>" class="form-control">
              </div>
              <div class="col-md-12">
                <label>Shipping Address</label>
                <input type="text" readonly value="<?php echo str_replace("*"," ",$row->shipping_address); ?>" class="form-control">
              </div>
              <div class="col-md-12">
                <label>Change Order Status</label>
                <select class="form-control" id="order_status_<?php echo $row->o_id ?>" name="order_status">
                  <option value="">Select Order Status</option>
                  <option value="1">New Order Or Ongoing </option>
                  <option value="2">Delivered</option>
                  <option value="3">Cancelled</option>
                </select>
              </div>
              <br>
            </div>
            <table class="table table-striped">
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
              </tr>
              <tr>
                <td><?php echo $row->p_name ; ?></td>
                <td><?php echo $row->p_image ; ?></td>
                <td><?php echo $row->size ; ?></td>
                <td><?php echo 1 ; ?></td>
                <td><?php echo $row->p_price ; ?></td>
                <td><?php echo $row->p_price ; ?></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="changeOrderStatus('<?php echo $row->o_id ?>');">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
  <?php } } ?>
<script type="text/javascript">
  function deleteProduct(rowid){
    
  }
  function changeOrderStatus(oid){
    if($('#order_status_'+oid).val() > 0){
      $.post( "<?php echo site_url('products/changeOrderStatus'); ?>", { oid: oid,statusid :  $('#order_status_'+oid).val()})
        .done(function( data ) {
          var data = JSON.parse(data);
          alert(data.message);
          if(data.status == 'success'){
            location.reload();
          }
       });
    }else{
      alert('Select Order status ');
    }
  }
</script>   