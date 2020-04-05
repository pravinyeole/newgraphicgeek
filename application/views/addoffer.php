<div class="col-lg-12">
    <h2><center><?php echo $title; ?></center></h2>

    <?php 
        $fattr = array('class' => 'form-signin');
        echo form_open_multipart('/offers/addoffers', $fattr);
        if(!empty($editproduct)){
          foreach($editproduct AS $row){
            $row_id = $row->c_id;
            $coupncode = $row->coupn_code;
            $dicsount_amount = $row->disc_amount;
            $minimum_purchse = $row->min_purchase_amt;
            $start_date = $row->size;
            $end_date = $row->discription;
			      $productimage = $row->offer_image;
			      $offer_status = $row->offer_status;
            $description = $row->description;
            $disc_type = $row->discount_type;
          }
          $image_req = 'false';
        }else{
            $row_id = 0;
            $coupncode = '';
            $dicsount_amount = '';
            $minimum_purchse = '';
            $start_date = '';
			      $end_date = '';
            $description = '';
            $productimage = '';
			      $offer_status = '';
            $disc_type = '';
            $image_req = 'required';
        }
    ?>
    <input type="hidden" name="row_id" id="row_id" value="<?php echo $row_id; ?>" >
    <div class="form-group">
      <?php echo form_label('Coupn Code','coupn_code');?>
      <?php echo form_input(array('name'=>'coupn_code', 'id'=> 'coupn_code', 'placeholder'=>'Coupn Code', 'class'=>'form-control', 'value' => $coupncode,'required'=>'required','onblur'=>'checkDuplicate(this.value)')); ?>
      <?php echo form_error('coupn_code');?>
    </div>
    <div class="form-group">
      <?php echo form_label('Discount Type','disc_type');?>
    <?php
        $dd_list_one = array(
                  ''  => 'Select Type',
                  '1'   => 'Cash',
                  '2'   => 'Percent',
                );
        $dd_name = "disc_type";
        echo form_dropdown($dd_name, $dd_list_one, set_value($dd_name,$disc_type),'class = "form-control" id="disc_type" required="required"');
    ?>
    </div>
    <div class="form-group">
      <?php echo form_label('Discount Amount','disc_amount');?>
      <?php echo form_input(array('name'=>'disc_amount', 'id'=> 'disc_amount', 'placeholder'=>'Discount Acmount (Eg. 500)', 'class'=>'form-control', 'value' => $dicsount_amount,'required'=>'required')); ?>
      <?php echo form_error('disc_amount');?>
    </div>
    
    <div class="form-group">
      <?php echo form_label('Mimimum Purchase Amount','min_purchase_amt');?>
      <?php echo form_input(array('name'=>'min_purchase_amt', 'id'=> 'min_purchase_amt', 'placeholder'=>'Mimimum Purchase Amount (Eg. 500)', 'class'=>'form-control', 'value'=> $minimum_purchse,'required'=>'required')); ?>
      <?php echo form_error('min_purchase_amt');?>
    </div>
    <div class="form-group">
      <?php echo form_label('Short Description','description');?>
      <?php echo form_input(array('name'=>'description', 'id'=> 'description', 'placeholder'=>'Special Diwali Offer On Purchaseof Rs.500 & more', 'class'=>'form-control', 'value'=> $description,'required'=>'required')); ?>
      <?php echo form_error('description');?>
    </div>
   <!--  <div class="form-group">
      <?php echo form_label('Start Date','start_date');?>
      <?php echo form_input(array('name'=>'start_date', 'id'=> 'start_date', 'placeholder'=> 'dd-mm-yyyy', 'class'=>'form-control', 'value'=> $start_date,'required'=>'required')); ?>
      <?php echo form_error('start_date');?>
    </div>
    <div class="form-group">
      <?php echo form_label('End Date','end_date');?>
      <?php echo form_input(array('name'=>'end_date', 'id'=> 'end_date', 'placeholder'=> 'dd-mm-yyyy', 'class'=>'form-control', 'value'=> $end_date,'required'=>'required')); ?>
      <?php echo form_error('end_date');?>
    </div> -->
    <div class="form-group">
      <?php echo form_label('Select Status','offer_status');?>
    <?php
        $dd_list = array(
                  ''  => 'Select Status',
                  '0'   => 'Inactive',
                  '1'   => 'Active',
				          '2'   => 'Expired',
                );
        $dd_name = "offer_status";
        echo form_dropdown($dd_name, $dd_list, set_value($dd_name,$offer_status),'class = "form-control" id="offer_status" required="required"');
    ?>
    </div>
    <div class="form-group">
        <?php echo form_label('Upload Image','product_img');?>
        <?php echo form_upload(array('name'=>'product_img', 'id'=> 'product_img', 'placeholder'=>'Product Quantity', 'class'=>'form-control', $image_req=>$image_req)); ?>
    </div>
    <input type="hidden" name="last_image" id="last_image" value="<?php echo $productimage;?>" >
    </div>
    <div class="col-sm-12">
      <?php if($row_id > 0){
          echo '<div class="col-sm-6"><a href="'.site_url('offers/viewoffers').'" class="btn btn-lg btn-danger btn-block">Back</a></div>';
          $button_name = 'Update';
      }else{
              echo '<div class="col-sm-6">'.form_reset(array("value"=>"Reset Form", "class"=>"btn btn-lg btn-danger btn-block")).'</div>';
          $button_name = 'Add';
      } ?>
      <div class="col-sm-6">
        <?php echo form_submit(array('value'=>$button_name, 'class'=>'btn btn-lg btn-primary btn-block')); ?>
      </div>
    </div>
    <?php echo form_close(); ?>
</div>


<script type="text/javascript">
  function checkDuplicate(offer_name){
      var row_id = $('#row_id').val();
      $.post( "<?php echo site_url('offers/checkduplicateoffer'); ?>", { row_id : row_id,offer_name:offer_name })
            .done(function( data ) {
              var obj = JSON.parse(data);
              if(obj.status == 'success'){
                alert( obj.message );
                $('#coupn_code').val('');
              }
        });  
  }
</script>