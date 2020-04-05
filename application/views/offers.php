    <div class="container">
      <div class="row">
        <div class="col-sm-10">
        <h2><?php echo $title ?></h2>
        </div>
        <div class="col-sm-2">
          <a href="<?php echo site_url('offers/addoffers'); ?>" class="btn btn-primary"> Add New </a>
        </div>
      </div>
        <table class="table table-hover table-bordered table-striped">
          <tr>
              <th>
                  Offer Image
              </th>
			        <th>
                  Coupn Code
              </th>
              <th>
                  Description
              </th>
              <th>
                  Discount Amount
              </th>
              <th>
                  Minimum Purchase Amount
              </th>
              <th>
                  Status
              </th>
              <th colspan="2">
                  Action
              </th>
          </tr>
                <?php 
                    if(is_array($offers)){
                      foreach($offers as $row){
                        if($row->offer_status == 1){
                          $offer_status = 'Active';
                        }else if($row->offer_status == 2){
                          $offer_status ='Expired';
                        }else{ 
                          $offer_status ='Inactive';
                        }
                        echo '<tr>';
                        echo '<td><img src="'.base_url().'public/offers_images/'.$row->offer_image.'" width="50px" height="50px" style="border-radius:100px"></td>';
						            echo '<td>'.$row->coupn_code.'</td>';
                        echo '<td>'.$row->description.'</td>';
                        echo '<td>'.$row->disc_amount.'</td>';
                        echo '<td>'.$row->min_purchase_amt.'</td>';
                        echo '<td>'.$offer_status.'</td>';
                        echo '<td><a href="'.site_url('offers/editoffers/'.$row->c_id).'" style="font-size: x-large;padding: 0px 7px 0px 7px;"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                  <a onclick="deleteOffer('.$row->c_id.')" style="font-size: x-large;color:red;" ><i class="fa fa-trash" aria-hidden="true"></i> </a></td>';
                        echo '</tr>';
                    }
                  }else{
                    echo '<tr><td colspan="7"><center> No Records </center></td></tr> ';
                  }
                ?>
        </table>
    </div>
<script type="text/javascript">
  function deleteOffer(productid){ 
    if(confirm("Are You sure to delete ?")){
        $.post( "<?php echo site_url('offers/deleteoffer'); ?>", { productid : productid })
            .done(function( data ) {
              var obj = JSON.parse(data);
              alert( obj.message );
            window.location.reload();
        });   
    }   
}
</script>   