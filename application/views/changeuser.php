<div class="col-sm-3">
</div>
<div class="col-lg-6">
    <h2>Change Profile</h2>
    <h5>Hello <span><?php echo $first_name; ?></span>.</h5>     
<?php 
    $fattr = array('class' => 'form-signin');
    echo form_open(site_url().'main/changeuser/', $fattr); ?>
    
    <div class="form-group">
      <?php echo form_input(array('name'=>'firstname', 'id'=> 'firstname', 'placeholder'=>'First Name', 'class'=>'form-control', 'value' => set_value('firstname', $groups->first_name))); ?>
      <?php echo form_error('firstname');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'lastname', 'id'=> 'lastname', 'placeholder'=>'Last Name', 'class'=>'form-control', 'value'=> set_value('lastname', $groups->last_name))); ?>
      <?php echo form_error('lastname');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> set_value('email', $groups->email))); ?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'contact', 'id'=> 'contact', 'placeholder'=>'Contact', 'class'=>'form-control', 'value'=> set_value('email', $groups->contact))); ?>
      <?php echo form_error('contact');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'state', 'id'=> 'state', 'placeholder'=>'State', 'class'=>'form-control', 'value'=> set_value('email', $groups->u_state))); ?>
      <?php echo form_error('address');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'city', 'id'=> 'city', 'placeholder'=>'City', 'class'=>'form-control', 'value'=> set_value('email', $groups->u_city))); ?>
      <?php echo form_error('address');?>
    </div>    
    <div class="form-group">
      <?php echo form_input(array('name'=>'address', 'id'=> 'address', 'placeholder'=>'Address', 'class'=>'form-control', 'value'=> set_value('email', $groups->u_address))); ?>
      <?php echo form_error('address');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'zip_code', 'id'=> 'zip_code', 'placeholder'=>'Postal Code', 'class'=>'form-control', 'value'=> set_value('email', $groups->u_zipcode))); ?>
      <?php echo form_error('address');?>
    </div>
    <div class="form-group">
      <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
      <?php echo form_error('password') ?>
    </div>
    <div class="form-group">
      <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
      <?php echo form_error('passconf') ?>
    </div>
    <?php echo form_submit(array('value'=>'Change', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
</div>
<div class="col-sm-3">
</div>