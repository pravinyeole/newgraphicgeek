<style type="text/css">
  #step_one input{
    text-align: center;
  }
</style>
<div class="row">
<div class="col-sm-6 " id="step_one">
    <h2>Update Details</h2>
    <h5>Hello <span><?php echo $first_name; ?></span>.</h5>     
<?php 
    $fattr = array('class' => 'form-signin');
    echo form_open(site_url().'/graphicmain/PaytmGateway/', $fattr); ?>
    <div class="form-group">
		<label for="firstname">First Name:</label>
      <?php echo form_input(array('name'=>'firstname', 'id'=> 'firstname', 'placeholder'=>'First Name', 'class'=>'form-control','required'=>'required' , 'value' => set_value('firstname', $groups->first_name))); ?>
      <?php echo form_error('firstname');?>
    </div>
    <div class="form-group">
		<label for="lastname">Last Name:</label>
      <?php echo form_input(array('name'=>'lastname', 'id'=> 'lastname', 'placeholder'=>'Last Name', 'class'=>'form-control','required'=>'required' , 'value'=> set_value('lastname', $groups->last_name))); ?>
      <?php echo form_error('lastname');?>
    </div>
    <div class="form-group">
		<label for="contact">Contact:</label>
      <?php echo form_input(array('name'=>'contact', 'id'=> 'contact', 'placeholder'=>'Contact', 'class'=>'form-control','required'=>'required' , 'value'=> set_value('email', $groups->contact))); ?>
      <?php echo form_error('contact');?>
    </div>
    <div class="form-group">
		<label for="state">State:</label>
      <?php echo form_input(array('name'=>'state', 'id'=> 'state', 'placeholder'=>'State', 'class'=>'form-control', 'required'=>'required' ,'value'=> set_value('email', $groups->u_state))); ?>
      <?php echo form_error('address');?>
    </div>
    <div class="form-group">
		<label for="city">City:</label>
      <?php echo form_input(array('name'=>'city', 'id'=> 'city', 'placeholder'=>'City', 'class'=>'form-control','required'=>'required' , 'value'=> set_value('email', $groups->u_city))); ?>
      <?php echo form_error('address');?>
    </div>    
    <div class="form-group">
		<label for="address">Address:</label>
      <?php echo form_input(array('name'=>'address', 'id'=> 'address', 'placeholder'=>'Address', 'class'=>'form-control', 'required'=>'required' ,'value'=> set_value('email', $groups->u_address))); ?>
      <?php echo form_error('address');?>
    </div>
    <div class="form-group">
		<label for="zip_code">Postal Code:</label>
      <?php echo form_input(array('name'=>'zip_code', 'id'=> 'zip_code', 'placeholder'=>'Postal Code', 'class'=>'form-control', 'required'=>'required' ,'value'=> set_value('email', $groups->u_zipcode))); ?>
      <?php echo form_error('address');?>
    </div>
  </div>
  <div class="col-sm-6" style="margin-top: 100px; ">
      <div class="form-group">
        <label>Select PromoCode</label>
        <select id="promocode" name="promocode" class="form-control" onchange="applyoffer(this.value);">
          <option value="0">Select Promocode</option>
          <?php foreach($coupns as $cup ): ?>
          <option value="<?php echo $cup->c_id ?>"><?php echo $cup->coupn_code ?></option>  
          <?php endforeach ?>
        </select>
      </div>
    <div class="pull-right" style="margin-top: 50px; "> 
      <b><h3>Billing Information </h3></b> <br>
        <h4>Total Bill Amount : <?php echo $TXN_AMOUNT; ?></h4>
        <h4>Shipping Charges : <?php print_r ($shipping->shipping_charge); ?></h4>
        <hr>
        <h4>Total Bill Amount : <?php print_r($shipping->shipping_charge+$TXN_AMOUNT);?></h4>
        <div id="discount_details">
          <h4 id="discount_one"></h4>
          <h4 id="discount_two"></h4>
        </div>

    </div>
  </div>
</div>
    <div class="col-lg-2 pull-right">
     <!-- <a href="#next_step" onclick="show_next_div();" class="btn btn-lg btn-primary btn-block">Next</a> -->
		<button type="submit" class="btn btn-lg btn-primary ">Make Payement</button>
    </div>
<div class="col-lg-12 " id="step_two" style="display: none">
    <h2>Shipping Address</h2>
    
    <div class="form-group">
    <label for="state">State:</label>
		<?php echo form_input(array('name'=>'state', 'id'=> 'state', 'placeholder'=>'State', 'class'=>'form-control', 'value'=> set_value('email', $groups->u_state))); ?>
      <?php echo form_error('address');?>
    </div>
    <div class="form-group">
		<label for="city">City:</label>
      <?php echo form_input(array('name'=>'city', 'id'=> 'city', 'placeholder'=>'City', 'class'=>'form-control', 'value'=> set_value('email', $groups->u_city))); ?>
      <?php echo form_error('address');?>
    </div>    
    <div class="form-group">
		<label for="address">Address:</label>
      <?php echo form_input(array('name'=>'address', 'id'=> 'address', 'placeholder'=>'Address', 'class'=>'form-control', 'value'=> set_value('email', $groups->u_address))); ?>
      <?php echo form_error('address');?>
    </div>
    <div class="form-group">
			<label for="zip_code">Postal Code:</label>
      <?php echo form_input(array('name'=>'zip_code', 'id'=> 'zip_code', 'placeholder'=>'Postal Code', 'class'=>'form-control', 'value'=> set_value('email', $groups->u_zipcode))); ?>
      <?php echo form_error('address');?>
    </div>
    <input type="hidden" id="CUST_ID" name="CUST_ID" value="<?php echo  $groups->id;?>">

      <div class="row col-sm-12">
        <div class="col-sm-6 ">
          <a href="#next_step" onclick="show_prv_div();" class="btn btn-lg btn-primary btn-block">Previous</a>
        </div>
        <div class="col-sm-6">
          <button type="submit" class="btn btn-lg btn-primary btn-block">Make Payement</button>
        </div>
      </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
  function show_next_div(){
       document.getElementById("step_two").style.display = 'block';
       document.getElementById("step_one").style.display = 'none';
  }
  function show_prv_div(){
       document.getElementById("step_two").style.display = 'none';
       document.getElementById("step_one").style.display = 'block';
  }
  function applyoffer(coupnocde){
    if(coupnocde > 0){
         $.post( "<?php echo site_url('offers/applaycoupncode'); ?>", { coupnocde : coupnocde })
            .done(function( data ) {
                var obj = JSON.parse(data);
                alert( obj.message );
                if(obj.status == 'success'){
                  var res = obj.amount_data.split('-');
                  $('#discount_one').html('Discount Amount : ' +res[1]);
                  $('#discount_two').html('Final Payment : ' + res[0]);
                }
        });   
    }else{
      alert('Coupn code removed.');
      $('#discount_one').html('');
      $('#discount_two').html('');
    }
  }
</script>