<style type="text/css">
.multiselect {
  width: 100%;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}
#checkboxes input[type="checkbox"]{
  margin: 0px 20px 0px 20px !important;
}
#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
</style>

<div class="col-lg-12">
    <h2><center><?php echo $title; ?></center></h2>

    <?php 
        $fattr = array('class' => 'form-signin');
        echo form_open_multipart('/products/addproduct', $fattr);
        if(!empty($editproduct)){
          foreach($editproduct AS $row){
            $row_id = $row->p_id;
            $productid = $row->poster_id;
            $productimage = $row->p_image;
            $productname = $row->p_name;
            $productsize = $row->size;
            $productdesc = $row->discription;
            $productprice = $row->p_price;
            $productqty = $row->stock_count;
            $productcategory = $row->p_category;
			      $producttype = $row->p_type;
            $subcategory  = $row->p_sub_category;
          }
          $image_req = 'false';
        }else{
            $row_id = 0;
            $productid = '';
            $productimage = '';
            $productname = '';
            $productsize = '';
			       $producttype = '';
            $productdesc = '';
            $productprice = '';
            $productqty = '';
            $productcategory = '';
            $subcategory = '';
            $image_req = 'required';
        }
    ?>
    <input type="hidden" name="row_id" id="row_id" value="<?php echo $row_id; ?>" >
	 <div class="form-group">
      <?php echo form_label('Select Type','producttype');?>
    <?php
        $product_typw_list = array(
                  ''  => 'Select Type',
                  '1'   => 'Poster',
                  '2'   => 'Paintings',
                );
        $product_typw_name = "producttype";
        echo form_dropdown($product_typw_name, $product_typw_list, set_value($product_typw_name,$producttype),'class = "form-control" id="producttype" required="required"');
    ?>
    </div>
    <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes()">
      <label>Select Sub Category</label>
      <select class = "form-control">
        <option>Select SubCategory</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes">
      <?php foreach($subCategory as $sublist) {?>
      <label><input type="checkbox" name="subcategory[]" value="<?php echo $sublist->sub_c_id ?>" <?php echo (in_array($sublist->sub_c_id,explode(',',$subcategory)))? 'checked' : ''; ?> /><?php echo $sublist->sub_c_name  ?></label>
      <?php }?>
    </div>
  </div>
    <div class="form-group">
      <?php echo form_label('Product ID','productid');?>
      <?php echo form_input(array('name'=>'productid', 'id'=> 'productid', 'placeholder'=>'Product ID', 'class'=>'form-control', 'value' => $productid)); ?>
      <?php echo form_error('productid');?>
    </div>
    <div class="form-group">
      <?php echo form_label('Product Name','productname');?>
      <?php echo form_input(array('name'=>'productname', 'id'=> 'productname', 'placeholder'=>'Product Name', 'class'=>'form-control', 'value' => $productname)); ?>
      <?php echo form_error('productname');?>
    </div>
    <div class="form-group">
      <?php echo form_label('Select Category','productsize');?>
    <?php
        $dd_list = array(
                  ''  => 'Select Size',
                  'A2'   => 'A2',
                  'A3'   => 'A3',
                  'A4'   => 'A4',
                  'A5'   => 'A5',
                );
        $dd_name = "productsize";
        echo form_dropdown($dd_name, $dd_list, set_value($dd_name,$productsize),'class = "form-control" id="productsize" required="required"');
    ?>
    </div>
    <div class="form-group">
      <?php echo form_label('Description','productdesc');?>
      <?php echo form_input(array('name'=>'productdesc', 'id'=> 'productdesc', 'placeholder'=>'Description', 'class'=>'form-control', 'value'=> $productdesc)); ?>
      <?php echo form_error('productdesc');?>
    </div>
    <div class="form-group">
      <?php echo form_label('Product Price','productprice');?>
      <?php echo form_input(array('name'=>'productprice', 'id'=> 'productprice', 'placeholder'=>'Product Price', 'class'=>'form-control', 'value'=> $productprice)); ?>
      <?php echo form_error('productprice');?>
    </div>
    <div class="form-group">
      <?php echo form_label('Product Quantity','productqty');?>
      <?php echo form_input(array('name'=>'productqty', 'id'=> 'productqty', 'placeholder'=>'Product Quantity', 'class'=>'form-control', 'value'=> $productqty)); ?>
      <?php echo form_error('productqty');?>
    </div>
   <!--  <div class="form-group">
      <?php echo form_label('Select Category','productcategory');?>
    <?php
        $dd_list = array(
                  ''  => 'Select Category',
                  '1'   => 'Best Seller',
                  '2'   => 'New Arrival',
                );
        $dd_name = "productcategory";
        echo form_dropdown($dd_name, $dd_list, set_value($dd_name,$productcategory),'class = "form-control" id="productcategory" required="required"');
    ?>
    </div> -->
    <div class="form-group">
        <?php echo form_label('Upload Image','product_img');?>
        <?php echo form_upload(array('name'=>'product_img', 'id'=> 'product_img', 'placeholder'=>'Product Quantity', 'class'=>'form-control', $image_req=>$image_req)); ?>
    </div>
    <input type="hidden" name="last_image" id="last_image" value="<?php echo $productimage;?>" >
    
    <div class="col-sm-12">
      <?php if($row_id > 0){
          echo '<div class="col-sm-6"><a href="'.site_url('products/productlist').'" class="btn btn-lg btn-danger btn-block">Back</a></div>';
          $button_name = 'Update';
      }else{
              echo '<div class="col-sm-6">'.form_reset(array("value"=>"Back", "class"=>"btn btn-lg btn-danger btn-block")).'</div>';
          $button_name = 'Add';
      } ?>
      <div class="col-sm-6">
        <?php echo form_submit(array('value'=>$button_name, 'class'=>'btn btn-lg btn-primary btn-block')); ?>
      </div>
    </div>
    <?php echo form_close(); ?>
</div>  

<script type="text/javascript">

var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
    </script>